<?php

namespace App\Controller;

use App\Entity\AccessPoint;
use App\Entity\Highway;
use App\Entity\HighwayExtension;
use App\Entity\HighwayVehicle;
use App\Entity\TransactionHistory;
use App\Entity\User;
use App\Entity\Vehicle;
use App\Entity\VehicleClass;
use App\Entity\Violation;
use App\Form\AdminType;
use App\Form\RegisterType;
use App\Repository\AccessPointRepository;
use App\Repository\HighwayExtensionRepository;
use App\Repository\HighwayRepository;
use App\Repository\HighwayVehicleRepository;
use App\Repository\PowerRepository;
use App\Repository\UserRepository;
use App\Repository\VehicleClassRepository;
use App\Repository\VehicleRepository;
use App\Repository\ViolationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use \DateTime;
use \DateTimeZone;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as RES;

class MainController extends AbstractController
{


    /**
     * @Route("/", name="main")
     */
    public function index()
    {

//        if (is_granted('IS_AUTHENTICATED_ANONYMOUS')){

            return $this->render('main/index.html.twig', [
                'controller_name' => 'MainController',
            ]);
//        }else {
//
//            return $this->redirect($this->generateUrl('home'));
//        }


    }

    /**
     * Test
     * @FOSRest\Get("/power_info")
     * @FOSRest\View()
     * @param PowerRepository $powerRepository
     * @return RES
     * @throws \Exception
     */
    public function getPowerInfo(PowerRepository $powerRepository)
    {

        $powers = $powerRepository->findAll();
        $message = array();

        foreach ($powers as $power){
            $dateNow = new DateTime("now", new DateTimeZone('Asia/Colombo') );
            $interval = date_diff(DateTime::createFromFormat('Y-m-d H:i:s',$dateNow->format('Y-m-d H:i:s')), $power->getDate());
            $hrs = $interval->format('%h') + ($interval->days * 24);
            $mins = $interval->format('%i');
            $sec = $interval->format('%s');

            $pw = array();
            $pw['highway']= $power->getInterchange()->getHighway()->getName();
            $pw['interchange']= $power->getInterchange()->getName();
            $pw['apName'] = $power->getName();
            $pw['time'] = $hrs.':'.$mins.':'.$sec;
            $message[] = $pw;
        }

        $reports = json_encode(["power" =>$message]);


        return new RES($reports,RES::HTTP_OK);

    }


    /**
     * @Route("/viewData/{id}", name="viewData")
     * @param Request $request
     * @param UserRepository $userRepository
     * @param VehicleClassRepository $vehicleClassRepository
     * @param HighwayRepository $highwayRepository
     * @param HighwayExtensionRepository $highwayExtensionRepository
     * @param AccessPointRepository $accessPointRepository
     * @param HighwayVehicleRepository $highwayVehicleRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewData(Request $request,UserRepository $userRepository,VehicleClassRepository $vehicleClassRepository, HighwayRepository $highwayRepository,HighwayExtensionRepository $highwayExtensionRepository, AccessPointRepository $accessPointRepository, HighwayVehicleRepository $highwayVehicleRepository)
    {

        $vehicleClasses = $vehicleClassRepository->findAll();
        $highways = $highwayRepository->findAll();
        $highwayExtensions = $highwayExtensionRepository->findAll();
        $accessPoints = $accessPointRepository->findAll();
        $highwayVehicles = $highwayVehicleRepository->findBy(['isCurrentlyIn' => '1']);
        $pendingVehicles = $highwayVehicleRepository->findBy(['isCurrentlyIn' =>'0']);
        $users = $userRepository->findAll();
        return $this->render('main/viewData.html.twig', [
            'controller_name' => 'MainController',
            'vehicleClasses' => $vehicleClasses,
            'highways' => $highways,
            'highwayExtensions' => $highwayExtensions,
            'highwayVehicles' => $highwayVehicles,
            'pendingVehicles' => $pendingVehicles,
            'accessPoints' => $accessPoints,
            'users'=>$users,
            'id' => $request->get('id')
        ]);


    }

    /**
     * @Route("/viewViolations/{id}", name="viewViolations")
     * @param Request $request
     * @param ViolationRepository $violationRepository
     * @param HighwayExtensionRepository $highwayExtensionRepository
     * @param HighwayRepository $highwayRepository
     * @param HighwayVehicleRepository $highwayVehicleRepository
     * @param VehicleRepository $vehicleRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewViolations(Request $request,ViolationRepository $violationRepository,HighwayExtensionRepository $highwayExtensionRepository,HighwayRepository $highwayRepository, HighwayVehicleRepository $highwayVehicleRepository, VehicleRepository $vehicleRepository)
    {

        $remove = $request->get('remove');


        if( $remove !=''){
            $remove = explode('#',$remove);
            /**
             * @var Vehicle $vehicle
             */
            $violation = $violationRepository->find($remove[0]);


            if ($remove[1]=='1'){
                $this->deleteViolation($remove[0]);
            }elseif ($remove[1]=='4'){
                $vehicle = $vehicleRepository->findByVehicleNo($violation->getVehicleNo())[0];
                $em = $this->getDoctrine()->getManager();
                $highwayVehicle = $highwayVehicleRepository->findByVehicle($vehicle)[0];
                $result = $this->deductToll($highwayVehicle);
                if($result){$this->deleteViolation($remove[0]);}

            }else{
                $vehicle = $vehicleRepository->findByVehicleNo($violation->getVehicleNo())[0];
                $hwv = $highwayVehicleRepository->findByVehicle($vehicle)[0];
                $result = $this->deductToll($hwv);
                if($result){$this->deleteViolation($remove[0]);}
            }



        }
        $interchanges = $highwayExtensionRepository->findAll();
        $highways = $highwayRepository->findAll();
        $violations = $violationRepository->findAllErrorAssigned();

        return $this->render('main/viewViolations.html.twig', [
            'controller_name' => 'MainController',
            'interchanges'=> $interchanges,
            'highways'=>$highways,
            'hw'=>$request->get('hw'),
            'hwi'=>$request->get('hwi'),
            'remove'=>$request->get('remove'),
            'violations' => $violations,
            'id' => $request->get('id')
        ]);


    }


    /**
     * @Route("/home", name="home")
     */
    public function home(UrlGeneratorInterface $urlGenerator){
        $em = $this->getDoctrine()->getManager();
        /**
         * @var User $user
         */
        $user = $em->find(User::class,$this->get('security.token_storage')->getToken()->getUser()->getId());

        if ($user->getRoles()[0] == "ROLE_USER"){
            if($user->getImage() == ""){
                $photoSrc =  "/images/login.svg";
            }else{
                $photoSrc =  "/uploads/".$user->getImage();
            }

            return $this->render('main/home.html.twig',[
                'photoSrc' => $photoSrc,
                'user' => $user,
                'editProfile'=> $this->generateUrl('update',['id'=> $this->get('security.token_storage')->getToken()->getUser()->getId()])
            ]);
        } else if ($user->getRoles()[0] == "ROLE_ADMIN"){
            return new RedirectResponse($urlGenerator->generate('admin'));
        }


    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin(Request $request,VehicleClassRepository $vehicleClassRepository, HighwayRepository $highwayRepository,HighwayExtensionRepository $highwayExtensionRepository, UrlGeneratorInterface $urlGenerator){
        $em = $this->getDoctrine()->getManager();
        $conn = $this->getDoctrine()->getManager()->getConnection();
        $vehicleClasses = $vehicleClassRepository->findAll();
        $highways = $highwayRepository->findAll();
        $highwayExtensions = $highwayExtensionRepository->findAll();

        $form = $this->createForm(AdminType::class);
        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {
//            dump($request->request);die;

            if(isset($request->request->all()['vehicleClasses'])){
                $registeredVehicleClasses = array_unique($request->request->all()['vehicleClasses'],SORT_STRING);
                $this->removeVehicleClasses($registeredVehicleClasses);
                $alreadyInVehicleClasses = $this->getVehicleClasses();
                foreach ($registeredVehicleClasses as $registeredVehicleClass){
                    $vehicleClass = explode("        |        ",$registeredVehicleClass);

                    if(!in_array($vehicleClass[0],$alreadyInVehicleClasses)){

                        $class = new VehicleClass();
                        $class->setClassName($vehicleClass[0]);
                        $class->setToll($vehicleClass[1]);
                        $em->persist($class);
                    }
                }
                $em->flush();
            }else{
                $this->removeVehicleClasses(array());
            }

            if(isset($request->request->all()['highways'])){
                $registeredHighways = array_unique($request->request->all()['highways'],SORT_STRING);
                $this->removeHighways($registeredHighways);
                $alreadyInHighways = $this->getHighways();
                foreach ($registeredHighways as $registeredHighway){
                    $highway = explode("        |        ",$registeredHighway);
                    if(sizeof($highway)==2){
                        if(!in_array($highway[1],$alreadyInHighways)){
                            $hw = new Highway();
                            $hw->setName($highway[0]);
                            $hw->setCodeName($highway[1]);
                            $em->persist($hw);

                        }
                    }
                    $em->flush();
                }
            }else{
                $this->removeHighways(array());
            }

            if(isset($request->request->all()['highwayExtensions'])){
                $registeredHighwayExtensions =array_unique( $request->request->all()['highwayExtensions'],SORT_STRING);
                $this->removeHighwayExtensions($registeredHighwayExtensions);
                $alreadyInHighwayExtensions = $this->getHighwayExtensions();
                foreach ($registeredHighwayExtensions as $registeredHighwayExtension){
                    $highwayExtension = explode("        |        ",$registeredHighwayExtension);

                   if(sizeof($highwayExtension)==8){

                       $macAddresses = explode(",",$highwayExtension[4]);
                       $apNames = explode(",",$highwayExtension[5]);
                       $gpsTags = explode("|",$highwayExtension[7]);

                       if(!in_array($highwayExtension[1],$alreadyInHighwayExtensions)){
                           $hway = $this->getDoctrine()->getRepository(Highway::class)->findByCodeName($highwayExtension[2])[0];
                           $exchange = new HighwayExtension();
                           $exchange->setName($highwayExtension[0]);
                           $exchange->setCodeName($highwayExtension[1]);
                           $exchange->setSequenceNo($highwayExtension[3]);
                           $exchange->setAccessKey($highwayExtension[6]);
                           $exchange->setHighway($hway);
                           $em->persist($exchange);
                           $em->flush();
                           for($i=0;$i<sizeof($macAddresses);$i++){
                               $ap = new AccessPoint();
                               $ap->setName($apNames[$i]);
                               $ap->setSsid(serialize(array($this->sssidGenerator($highwayExtension[1],$apNames[$i]))));
                               $ap->setMacAddress($macAddresses[$i]);
                               $ap->setGps($gpsTags[$i]);
                               $ap->setHighwayExtension($exchange);
                               $em->persist($ap);
                               $em->flush();
                           }

                       }
                   }
                }
            }else{
                $this->removeHighwayExtensions(array());
            }



            return new RedirectResponse($urlGenerator->generate('admin'));

        }

            return $this->render('main/admin.html.twig',[
            'form'=>$form->createView(),
            'vehicleClasses' => $vehicleClasses,
            'highways' => $highways,
            'highwayExtensions' => $highwayExtensions
           ]);
    }

    public function getHighwayExtensions(){
        $highwayExtensionObjects = $this->getDoctrine()->getRepository(HighwayExtension::class)->findAll();
        $highwayExtensions = array();
        foreach ($highwayExtensionObjects as $highwayExtensionObject){
            $highwayExtensions[]=$highwayExtensionObject->getCodeName();
        }
        return $highwayExtensions;
    }

    public function removeHighwayExtensions($highwayExtensions){
        $conn = $this->getDoctrine()->getManager()->getConnection();
        $regHighwayExtensions= $this->getHighwayExtensions();
        $newHighwayExtensions = array();
        foreach ($highwayExtensions as $highwayExtension){
            $newHighwayExtensions[]= explode("        |        ",$highwayExtension)[1];
        }
        foreach ($regHighwayExtensions as $regHighwayExtension){
            if(!in_array($regHighwayExtension, $newHighwayExtensions)){
                $sql = 'DELETE FROM access_point WHERE highway_extension_id=(SELECT id FROM highway_extension WHERE code_name=:codeName );';
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'codeName'=> $regHighwayExtension]);

                $sql = 'DELETE FROM highway_extension WHERE code_name=:codeName;';
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'codeName'=> $regHighwayExtension]);
            }
        }
    }




    public function getHighways(){
        $highwayObjects = $this->getDoctrine()->getRepository(Highway::class)->findAll();
        $highways = array();
        foreach ($highwayObjects as $highwayObject){
            $highways[]=$highwayObject->getCodeName();
        }
        return $highways;
    }

    public function removeHighways($highways){
        $conn = $this->getDoctrine()->getManager()->getConnection();
        $regHighways= $this->getHighways();
        $newHighways = array();
        foreach ($highways as $highway){
            if(sizeof(explode("        |        ",$highway))==2) {
                $newHighways[] = explode("        |        ", $highway)[1];
            }
        }
        foreach ($regHighways as $regHighway){
            if(!in_array($regHighway, $newHighways)){
                $sql = 'DELETE FROM access_point WHERE highway_extension_id IN (SELECT  id FROM highway_extension WHERE highway_id IN (SELECT  id FROM highway WHERE code_name=:codeName));';
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'codeName'=> $regHighway]);

                $sql = 'DELETE FROM highway_extension WHERE highway_id = (SELECT  id FROM highway WHERE code_name=:codeName);';
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'codeName'=> $regHighway]);

                $sql = 'DELETE FROM highway WHERE code_name=:codeName;';
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'codeName'=> $regHighway]);
            }
        }
    }




    public function getVehicleClasses(){
        $vehicleClassObjects = $this->getDoctrine()->getRepository(VehicleClass::class)->findAll();
        $vehicleClasses = array();
        foreach ($vehicleClassObjects as $vehicleClassObject){
            $vehicleClasses[]=$vehicleClassObject->getClassName();
        }
        return $vehicleClasses;
    }

    public function removeVehicleClasses($vehicleClasses){
        $conn = $this->getDoctrine()->getManager()->getConnection();
        $regVehicleClasses= $this->getVehicleClasses();
        $newVehicleClasses = array();
        foreach ($vehicleClasses as $vehicleClass){
            $newVehicleClasses[]= explode("        |        ",$vehicleClass)[0];
        }
        foreach ($regVehicleClasses as $regVehicleClass){
            if(!in_array($regVehicleClass, $newVehicleClasses)){
                $sql = 'UPDATE vehicle SET class_id=null WHERE class_id=(SELECT id FROM vehicle_class WHERE class_name=:className);';
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'className'=> $regVehicleClass]);

                $sql = 'DELETE FROM vehicle_class WHERE class_name=:className;';
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'className'=> $regVehicleClass]);
            }
        }
    }

    public function sssidGenerator($extensionCodeName, $accessPointName){

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $ssid = '';
        for ($i = 0; $i < (24-strlen($extensionCodeName)-strlen($accessPointName)-1); $i++) {
            $ssid .= $characters[rand(0, $charactersLength - 1)];
        }
        $prefix = "ORT@#HW";
        return $prefix.$extensionCodeName.$ssid.'_'.$accessPointName;

    }

    public  function deleteViolation($id){
        $em = $this->getDoctrine()->getManager();
        $violation = $em->getRepository(Violation::class)->find($id);
        $em->remove($violation);
        $em->flush();
    }

    public function deductToll(HighwayVehicle $highwayVehicle){
        $em = $this->getDoctrine()->getManager();
        $conn = $this->getDoctrine()->getManager()->getConnection();
        /**
         * @var User $user
         */
        $user = $highwayVehicle->getDrivedBy();
        $user = $this->getDoctrine()->getRepository(User::class)->find($user);

        if((float)$user->getAccount()->getBalance() >= (float)$highwayVehicle->getToll()){
            $balance = (float)$user->getAccount()->getBalance() - (float)$highwayVehicle->getToll();
            $user->getAccount()->setBalance((float)($balance));
            $user->setPendingTransaction(false);
            $user->setRevisionNo($user->getRevisionNo()+1);
            $transaction = new TransactionHistory();
            $transaction->setUser($user);
            $transaction->setEntrance($highwayVehicle->getEntrance()->getName());
            $transaction->setEgress($highwayVehicle->getEgress()->getName());
            $datetime1 = $highwayVehicle->getEnterTime();
            $datetime2 = $highwayVehicle->getExitTime();
            $interval = date_diff($datetime2, $datetime1);
            $hrs = $interval->format('%h') + ($interval->days * 24) + ($interval->format('%i') / 60);
            $transaction->setDuration(round($hrs,2)." hours");
            $transaction->setVehicleNo($highwayVehicle->getVehicle()->getVehicleNo());
            $transaction->setToll($highwayVehicle->getToll());
            date_default_timezone_set('Asia/Colombo');
            $transaction->setDate($highwayVehicle->getExitTime());
            $em->persist($transaction);
            $em->flush();

            $sql = 'DELETE FROM highway_vehicle WHERE id=:id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'id'=> $highwayVehicle->getId()]);

            return true;
        }else{
            $user->setPendingTransaction(true);
            $user->setRevisionNo($user->getRevisionNo()+1);
            $em->flush();
            return false;
        }

    }


}
