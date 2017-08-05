<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Candidate;
use AppBundle\Form\CandidateType;
use AppBundle\Form\ProfileType;

class DefaultController extends Controller {

    /**
     * New Candidate Page
     * 
     * @Route("/", name="homepage", options = { "expose" = true })
     */
    public function indexAction(Request $request) {

        $em = $this->getDoctrine()->getManager();        
        //check for ajax call
        if ($request->isXmlHttpRequest()) {
            if ($request->request->get('flag') == 'program_type') {
                //extract the program_type_id sent through ajax call
                $programTypeId = $request->request->get('program_type_id');                
                //get final array response based on program type from repository
                $final = $em->getRepository('AppBundle:ProgramTypeChoiceRule')->getDiPibyPt($programTypeId);
                //finally convert the $final array into jason format, wrap it in a new response object and then return it
                return $programOfInterest_json = new Response(json_encode($final));
            }
            if ($request->request->get('flag') == 'program_of_interest') {
                //extract the program_of_interest_id from the ajax request
                $programOfInterestId = $request->request->get('program_of_interest_id');
                $final = $em->getRepository('AppBundle:ProgramTypeChoiceRule')->getDibyPi($programOfInterestId);
                //finally convert the $final array into jason format, wrap it in a new response object and then return it
                return $programOfInterest_json = new Response(json_encode($final));
            }
            if ($request->request->get('flag') == 'desired_intake'){
                
                $programTypeId = $request->request->get('program_type_id');
                $programOfInterestId = $request->request->get('program_of_interest_id');
                $desiredIntakeId = $request->request->get('desired_intake_id');
                
                $intakeYear = $em->getRepository('AppBundle:ProgramTypeChoiceRule')->getYearbyDi($programTypeId,$programOfInterestId,$desiredIntakeId);
                  $year = $this->container->get('intakeyear_utility')->getIntakeYear($intakeYear);
                
                return $intakeYear_json = new Response(json_encode($year));
            }    
        }
        //create new Candidate object
        $candidate = new Candidate();
        //Pass the CandidateType() object and the newly created Candidate object to the createForm() method
        $form = $this->createForm(new CandidateType(), $candidate);

        $form->handleRequest($request);
        //check for validation
        if ($form->isValid()) {
            //save the $candidate object into database
            $em->persist($candidate);
            $em->flush();
            //redirect to success page
            return $this->redirectToRoute('successpage');
        }
        //send the $form object to index.html.twig and create the form view
        return $this->render('default/index.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    /**
     * Success page
     * 
     * @Route("/success", name="successpage")      
     */
    public function successAction(Request $request) {
        return $this->render('default/success.html.twig', array());
    }

    /**
     * Profile Page
     * 
     * @Route("/profile", name="profilepage", options = { "expose" = true })      
     */
    public function profileAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        //find the Candidate object with Id 1(for test purpose we are displaying first record)
        $selectedcandidate = $em->getRepository('AppBundle:Candidate')->find(1);
        //check for ajax call
        if ($request->isXmlHttpRequest()) {
            //check for flag load_type
            if ($request->request->get('flag') == 'load_type') {
                
                //repository call here to return the $intakeYear array                
                $final = $em->getRepository('AppBundle:ProgramTypeChoiceRule')->getProfilePiDibySelectedCandidate($selectedcandidate);
                $intakeYear = $em->getRepository('AppBundle:ProgramTypeChoiceRule')->getProfileYearbySelectedCandidate($selectedcandidate);
                $year = $this->container->get('intakeyear_utility')->getIntakeYear($intakeYear);                
                $final['iy'] = $year;
                //finally convert the $final array into jason format, wrap it in a new response object and then return it
                return $programOfInterest_json = new Response(json_encode($final));
            }
            //check for flag program_type
            if ($request->request->get('flag') == 'program_type') {
                //extract the program_type_id from the ajax request
                $programTypeId = $request->request->get('program_type_id');
 
                $final = $em->getRepository('AppBundle:ProgramTypeChoiceRule')->getProfilePiDibyPt($programTypeId);
                //finally convert the $final array into jason format, wrap it in a new response object and then return it
                return $programOfInterest_json = new Response(json_encode($final));
            }
            //check for flag program_of_interest
            if ($request->request->get('flag') == 'program_of_interest') {
                //extract the program_of_interest_id from the ajax request
                $programOfInterestId = $request->request->get('program_of_interest_id');
                
                $final = $em->getRepository('AppBundle:ProgramTypeChoiceRule')->getProfileDibyPi($programOfInterestId);
                //finally convert the $final array into jason format, wrap it in a new response object and then return it
                return $programOfInterest_json = new Response(json_encode($final));
            }
            //check for flag desired_intake
            if ($request->request->get('flag') == 'desired_intake') {
                //extract the program_of_interest_id from the ajax request
                $desiredIntakeId = $request->request->get('desired_intake_id');
                //extract the program_of_interest_id from the ajax request
                $programOfInterestId = $request->request->get('program_of_interest_id');
                //extract the program_of_interest_id from the ajax request
                $programTypeId = $request->request->get('program_type_id');
                //repository call
                $intakeYear = $em->getRepository('AppBundle:ProgramTypeChoiceRule')->getProfileIntakeYearbyDiPiPt($programTypeId,$programOfInterestId,$desiredIntakeId);
                $year = $this->container->get('intakeyear_utility')->getIntakeYear($intakeYear);
                //finally convert the $year into jason format, wrap it in a new response object and then return it
                return $programOfInterest_json = new Response(json_encode($year));
            }
        }
        //Pass the ProfileType() object and the selectedcandidate object to the createForm() method
        $form = $this->createForm(new ProfileType($selectedcandidate), $selectedcandidate);
        
        $form->handleRequest($request);
        //check for validation
        if ($form->isValid()) {
            //save $selectedcandidate object to the database
            $em->persist($selectedcandidate);
            $em->flush();
            //redirect to success page
            return $this->redirectToRoute('successpage');
        }
        //pass the form object to profile.html.twig and create form view
        return $this->render('default/profile.html.twig', array(
                    'form' => $form->createView(),
        ));
    }
    

}

