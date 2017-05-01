<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Note;
use AppBundle\Form\NoteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        return $this->render('::base.html.twig',array('body_id'=>'home'));
    }

    /**
     * @Route("/enseignant", name="enseignant")
     */
    public function enseignantAction (Request $request)
    {
        /*if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ENSEIGNANT')) {
            return $this->redirectToRoute('home');
        }*/
        return $this->render('@App/Enseignant/index.html.twig');
    }

    /**
     * @Route("/enseignant/videos", name="enseignant_videos")
     */
    public function enseignantVideoAction (Request $request)
    {
        /*if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ENSEIGNANT')) {
            return $this->redirectToRoute('home');
        }*/
        return $this->render('@App/Enseignant/videos.html.twig');
    }

    /**
     * @Route("/enseignant/photos", name="enseignant_photos")
     */
    public function enseignantPhotosAction (Request $request)
    {
       /* if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ENSEIGNANT')) {
            return $this->redirectToRoute('home');
        }*/
        return $this->render('@App/Enseignant/photos.html.twig');
    }

    /**
     * @Route("/enseignant/documents", name="enseignant_documents")
     */
    public function enseignantDocumentsAction (Request $request)
    {
       /* if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ENSEIGNANT')) {
            return $this->redirectToRoute('home');
        }*/
        return $this->render('@App/Enseignant/documents.html.twig');
    }

    /**
     * @Route("/eleve", name="eleve")
     */
    public function eleveAction (Request $request)
    {
        /*if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ELEVE')) {
            return $this->redirectToRoute('home');
        }*/
        return $this->render('@App/Eleve/index.html.twig');
    }

    /**
     * @Route("/eleve/medias", name="eleve_medias")
     */
    public function eleveMediasAction (Request $request)
    {
        /*if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ELEVE')) {
            return $this->redirectToRoute('home');
        }*/
        return $this->render('@App/Eleve/medias.html.twig');
    }

    /**
     * @Route("/eleve/ressources", name="eleve_ressources")
     */
    public function eleveRessourcesAction (Request $request)
    {
        /*if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ELEVE')) {
            return $this->redirectToRoute('home');
        }*/
        return $this->render('@App/Eleve/ressources.html.twig');
    }

    /**
     * @Route("/eleve/remue-meninges", name="eleve_remue_meninges")
     */
    public function eleveRemueMeningesAction (Request $request)
    {
        /*if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ELEVE')) {
            return $this->redirectToRoute('home');
        }*/
        return $this->render('@App/Eleve/remue_meninges.html.twig');
    }

    /**
     * @Route("/eleve/remue-meninges/images-associees", name="eleve_remue_meninges_images_associees")
     */
    public function eleveRemueMeningesImagesAssocAction(Request $request)
    {
        /*if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ELEVE')) {
            return $this->redirectToRoute('home');
        }*/

        if($request->isXmlHttpRequest())
        {
            $rp1 = trim($request->get('rp1'));
            $rp2 = trim($request->get('rp2'));
            $rp3 = trim($request->get('rp3'));

            if($rp1 === "très basse énergie")
            {
                if($rp2 === "basse énergie")
                {
                    if($rp3 === "profonde")
                    {
                        $message ="Félicitations vous avez terminé le remue-méninge : Images associées.";
                        $alert = $this->renderView('AppBundle:Eleve:alert.html.twig',array('message'=>$message));
                        return new JsonResponse(array('alert'=>$alert));
                    }
                    else{
                        $rp = "rp3";
                        return new JsonResponse(array('rp'=>$rp));
                    }
                }
                else{
                    $rp = "rp2";
                    return new JsonResponse(array('rp'=>$rp));
                }
            }
            else{
                $rp = "rp1";
                return new JsonResponse(array('rp'=>$rp));
            }
        }
        return $this->render('@App/Eleve/images_associees.html.twig');
    }

    /**
     * @Route("/eleve/remue-meninges/reconstitution", name="eleve_remue_meninges_reconstitution")
     */
    public function eleveRemueMeningesReconstitutionAction(Request $request)
    {
        /*if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ELEVE')) {
            return $this->redirectToRoute('home');
        }*/

        if($request->isXmlHttpRequest())
        {
            $rp_orange_attendu = "24153";
            $rp_blue_attendu = "35142";

            $rp1 = trim($request->get('rp1'));
            $rp2 = trim($request->get('rp2'));
            $rp3 = trim($request->get('rp3'));
            $rp4 = trim($request->get('rp4'));
            $rp5 = trim($request->get('rp5'));
            /*$rp6 = trim($request->get('rp6'));
            $rp7 = trim($request->get('rp7'));
            $rp8 = trim($request->get('rp8'));
            $rp9 = trim($request->get('rp9'));
            $rp10 = trim($request->get('rp10'));*/

            $rp_orange = $rp1.$rp2.$rp3.$rp4.$rp5;
            /*$rp_blue = $rp6.$rp7.$rp8.$rp9.$rp10;*/

            if($rp_orange === $rp_orange_attendu /*&& $rp_blue === $rp_blue_attendu*/)
            {
                $message ="Félicitations vous avez terminé le remue-méninge : Reconstitution.";
                $alert = $this->renderView('AppBundle:Eleve:alert.html.twig',array('message'=>$message));
                $userManager = $this->get('fos_user.user_manager');
                $user = $this->getUser();
                $user->setLevel2(true);

                $level2 = $user->getLevel2();
                $level3 = $user->getLevel3();

                if($level2 === true  && $level3 === true){
                    $user->setLevel4(true);
                }

                $userManager->updateUser($user);
                return new JsonResponse(array('alert'=>$alert));
            }
            else{
                $message ="Les vidéos ne sont pas classées dans le bon ordre, veuillez vérifier vos réponses.";
                $alert = $this->renderView('AppBundle:Eleve:error.html.twig',array('message'=>$message));
                return new JsonResponse(array('error_rep'=>$alert));
            }
        }
        return $this->render('@App/Eleve/reconstitution.html.twig');
    }

    /**
     * @Route("eleve/remue-meninges/souviens-toi" ,name="eleve_remue_meninges_souviens_toi")
     */
    public function eleveRemueMeningesSouviensToi(Request $request)
    {
        /*if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ELEVE')) {
            return $this->redirectToRoute('home');
        }*/

        if($request->isXmlHttpRequest())
        {
            $rp1_c = "se forment à partir de la transformation de matière fabriquée par des êtres vivants";
            $rp2_c = "permettent une production d'énergie par combustion";
            $rp3_c = "sont inépuisables à échelle de temps humaine";
            $rp4_c = "ne produisent aucune émission de CO2 dans l'atmosphère";

            $rp1_s = "gaz naturel";
            $rp2_s = "charbon";
            $rp2_s_2 = "pétrole";
            $rp3_s = "chaleur de la Terre";
            $rp3_s_2 = "soleil";
            $rp3_s_3 = "vent";
            $rp4_s = "mouvement de l'eau";
            $rp4_s_2 = "biomasse";

            $rp1_t = "combustion";
            $rp2_t = "combustion";
            $rp2_t_2 = "combustion";
            $rp3_t = "chauffage, électricité";
            $rp3_t_2 = "panneaux thermiques et photovoltaïques";
            $rp4_t = "turbines des barrages, des centrales marémotrices, des hydroliennes";
            $rp4_t_2 = "combustion";

            $rp = $rp1_c.$rp2_c.$rp3_c.$rp4_c.$rp1_s.$rp2_s.$rp2_s_2.$rp3_s.$rp3_s_2.$rp3_s_3.$rp4_s.$rp4_s_2.$rp1_t.$rp2_t.$rp2_t_2.$rp3_t.$rp3_t_2.$rp4_t.$rp4_t_2;

            $rp1_c_s = ($request->get('rp1_c'));
            $rp2_c_s = ($request->get('rp2_c'));
            $rp3_c_s = ($request->get('rp3_c'));
            $rp4_c_s = ($request->get('rp4_c'));

            $rp1_s_s = ($request->get('rp1_s'));
            $rp2_s_s = ($request->get('rp2_s'));
            $rp2_s_2_s = ($request->get('rp2_s_2'));
            $rp3_s_s = ($request->get('rp3_s'));
            $rp3_s_2_s = ($request->get('rp3_s_2'));
            $rp3_s_3_s = ($request->get('rp3_s_3'));
            $rp4_s_s = ($request->get('rp4_s'));
            $rp4_s_2_s = ($request->get('rp4_s_2'));

            $rp1_t_s = ($request->get('rp1_t'));
            $rp2_t_s = ($request->get('rp2_t'));
            $rp2_t_2_s = ($request->get('rp2_t_2'));
            $rp3_t_s = ($request->get('rp3_t'));
            $rp3_t_2_s = ($request->get('rp3_t_2'));
            $rp3_t_3_s = ($request->get('rp3_t_3'));
            $rp4_t_s = ($request->get('rp4_t'));
            $rp4_t_2_s = ($request->get('rp4_t_2'));

            $rp_s = $rp1_c_s.$rp2_c_s.$rp3_c_s.$rp4_c_s.$rp1_s_s.$rp2_s_s.$rp2_s_2_s.$rp3_s_s.$rp3_s_2_s.$rp3_s_3_s.$rp4_s_s.$rp4_s_2_s.$rp1_t_s.$rp2_t_s.$rp2_t_2_s.$rp3_t_s.$rp3_t_2_s.$rp3_t_3_s.$rp4_t_s.$rp4_t_2_s;

            if($rp === $rp_s)
            {
                $message ="Félicitations vous avez terminé le remue-méninge : Mise à niveau.";
                $alert = $this->renderView('AppBundle:Eleve:alert.html.twig',array('message'=>$message));

                $userManager = $this->get('fos_user.user_manager');
                $user = $this->getUser();
                $user->setLevel2(true);
                $userManager->updateUser($user);
                return new JsonResponse(array('alert'=>$alert));
            }
            else{
                $message ="Veuillez vérifier vos réponses.";
                $alert = $this->renderView('AppBundle:Eleve:error.html.twig',array('message'=>$message));
                return new JsonResponse(array('error_rep'=>$alert));
            }
        }
        return $this->render('@App/Eleve/mise_a_niveau.html.twig');
    }

    /**
     * @Route("eleve/remue-meninges/quels-pays" , name="eleve_remue_meninges_quels_pays")
     */
    public function eleveRemueMeningesQuelsPays(Request $request)
    {
        /*if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ELEVE')) {
            return $this->redirectToRoute('home');
        }*/

        if($request->isXmlHttpRequest())
        {
            /*réponses : Islande - Nouvelle Zélande - Philippines
            - États-Unis - Les Antilles Françaises - Japon
            - Indonésie - Italie - Mexique*/
            $p1 = "Islande";
            $p2 = "Nouvelle-Zélande";
            $p3 = "Philippines";
            $p4 = "Etats-Unis";
            $p5 = "LesAntillesFrançaises";
            $p6 = "Japon";
            $p7 = "Indonésie";
            $p8 = "Italie";
            $p9 = "Mexique";

            $rep = $request->get('rps');
            $rep = preg_replace('/\s/','',$rep);

            if(strpos($rep,$p1) || strpos($rep,$p1) === 0)
            {
                $rep = str_replace($p1,'',$rep);
                $rep = $rep."1";
            }
            if(strpos($rep,$p2) || strpos($rep,$p2) === 0)
            {
                $rep = str_replace($p2,'',$rep);
                $rep = $rep."1";
            }
            if(strpos($rep,$p3) || strpos($rep,$p3) === 0)
            {
                $rep = str_replace($p3,'',$rep);
                $rep = $rep."1";
            }
            if(strpos($rep,$p4) || strpos($rep,$p4) === 0)
            {
                $rep = str_replace($p4,'',$rep);
                $rep = $rep."1";
            }
            if(strpos($rep,$p5) || strpos($rep,$p5) === 0)
            {
                $rep = str_replace($p5,'',$rep);
                $rep = $rep."1";
            }
            if(strpos($rep,$p6) || strpos($rep,$p6) === 0)
            {
                $rep = str_replace($p6,'',$rep);
                $rep = $rep."1";
            }
            if(strpos($rep,$p7) || strpos($rep,$p7) === 0)
            {
                $rep = str_replace($p7,'',$rep);
                $rep = $rep."1";
            }
            if(strpos($rep,$p8) || strpos($rep,$p8) === 0)
            {
                $rep = str_replace($p8,'',$rep);
                $rep = $rep."1";
            }
            if(strpos($rep,$p9) || strpos($rep,$p9) === 0)
            {
                $rep = str_replace($p9,'',$rep);
                $rep = $rep."1";
            }


            if($rep=== "111111111")
            {

                $message ="Félicitations vous avez terminé le remue-méninge : Quels pay(s) ?.";
                $alert = $this->renderView('AppBundle:Eleve:alert.html.twig',array('message'=>$message));
                $button_next = $this->renderView('AppBundle:Eleve:button_next_quels_pays.html.twig',array('message'=>$message));
                return new JsonResponse(array('alert'=>$alert,'button_next'=>$button_next));
            }
            else{
                $message ="Veuillez vérifier vos réponses.";
                $alert = $this->renderView('AppBundle:Eleve:error.html.twig',array('message'=>$message));
                return new JsonResponse(array('error_rep'=>$alert));
            }
        }
        return $this->render('@App/Eleve/quels_pays.html.twig');
    }

    /**
     * @Route("eleve/remue-meninges/quels-pays-2", name="eleve_remue_meninges_quels_pays_2")
     */
    public function eleveRemueMeningesQuelsPays2(Request $request)
    {
        /*if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ELEVE')) {
            return $this->redirectToRoute('home');
        }*/

        if($request->isXmlHttpRequest())
        {
            $rp1c1 = "Japon";
            $rp2c1 = "Philippines";
            $rp3c1 = "Indonésie";
            $rp4c1 = "Nouvelle-Zélande";
            $rp5c1 = "États-Unis";
            $rp6c1 = "Mexique";
            $rp7c1 = "Antilles Françaises";
            $rp8c1 = "Italie";
            $rp9c1 = "Islande";

            $rp1c2 = "Italie";
            $rp2c2 = "Islande";
            $rp3c2 = "Antilles Françaises";
            $rp4c2 = "Mexique";
            $rp5c2 = "États-Unis";
            $rp6c2 = "Nouvelle-Zélande";
            $rp7c2 = "Indonésie";
            $rp8c2 = "Philippines";
            $rp9c2 = "Japon";

            $rp1_text_s = $request->get('rp1_text');
            $rp2_text_s = $request->get('rp2_text');
            $rp3_text_s = $request->get('rp3_text');
            $rp4_text_s = $request->get('rp4_text');

            $rp1_text = "contextes géologiques";
            $rp2_text = "fort";
            $rp3_text = "subduction";
            $rp4_text = "point chaud";

            $rp_text = $rp1_text.$rp2_text.$rp3_text.$rp4_text;

            $rp_text_s = $rp1_text_s.$rp2_text_s.$rp3_text_s.$rp4_text_s;

            $rp1c1_s = $request->get('rp1c1');
            $rp2c1_s = $request->get('rp2c1');
            $rp3c1_s = $request->get('rp3c1');
            $rp4c1_s = $request->get('rp4c1');
            $rp5c1_s = $request->get('rp5c1');
            $rp6c1_s = $request->get('rp6c1');
            $rp7c1_s = $request->get('rp7c1');
            $rp8c1_s = $request->get('rp8c1');
            $rp9c1_s = $request->get('rp9c1');

            $rp1c2_s = $request->get('rp1c2');
            $rp2c2_s = $request->get('rp2c2');
            $rp3c2_s = $request->get('rp3c2');
            $rp4c2_s = $request->get('rp4c2');
            $rp5c2_s = $request->get('rp5c2');
            $rp6c2_s = $request->get('rp6c2');
            $rp7c2_s = $request->get('rp7c2');
            $rp8c2_s = $request->get('rp8c2');
            $rp9c2_s = $request->get('rp9c2');

            $rpc1 = $rp1c1.$rp2c1.$rp3c1.$rp4c1.$rp5c1.$rp6c1.$rp7c1.$rp8c1.$rp9c1;
            $rpc2 = $rp1c2.$rp2c2.$rp3c2.$rp4c2.$rp5c2.$rp6c2.$rp7c2.$rp8c2.$rp9c2;

            $rpc1_s = $rp1c1_s.$rp2c1_s.$rp3c1_s.$rp4c1_s.$rp5c1_s.$rp6c1_s.$rp7c1_s.$rp8c1_s.$rp9c1_s;
            $rpc2_s = $rp1c2_s.$rp2c2_s.$rp3c2_s.$rp4c2_s.$rp5c2_s.$rp6c2_s.$rp7c2_s.$rp8c2_s.$rp9c2_s;

            if($rpc1 === $rpc1_s && $rpc2 === $rpc2_s && $rp_text_s === $rp_text){
                $message ="Félicitations vous avez terminé le remue-méninge : Quels pay(s) ?.";
                $alert = $this->renderView('AppBundle:Eleve:alert.html.twig',array('message'=>$message));
                return new JsonResponse(array('alert'=>$alert));
            }
            else{
                $message ="Veuillez vérifier vos réponses.";
                $alert = $this->renderView('AppBundle:Eleve:error.html.twig',array('message'=>$message));
                return new JsonResponse(array('error_rep'=>$alert));
            }
        }
        return $this->render('@App/Eleve/quels_pays_2.html.twig');
    }

    /**
     * @Route("eleve/remue-meninges/quizz", name="eleve_remue_meninges_quizz")
     */
    public function eleveRemueMeningesQuizz(Request $request)
    {
        /*if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ELEVE')) {
            return $this->redirectToRoute('home');
        }*/

        if($request->isXmlHttpRequest()){

            $quizz = 'baccbcacabcab';
            $Q1 = trim($request->get('Q1'));
            $Q2 = trim($request->get('Q2'));
            $Q3 = trim($request->get('Q3'));
            $Q4 = trim($request->get('Q4'));
            $Q5 = trim($request->get('Q5'));
            $Q6 = trim($request->get('Q6'));
            $Q7 = trim($request->get('Q7'));
            $Q8 = trim($request->get('Q8'));
            $Q9 = trim($request->get('Q9'));
            $Q10 = trim($request->get('Q10'));
            $Q11 = trim($request->get('Q11'));
            $Q12 = trim($request->get('Q12'));
            $Q13 = trim($request->get('Q13'));

            $rep_quizz = $Q1.$Q2.$Q3.$Q4.$Q5.$Q6.$Q7.$Q8.$Q9.$Q10.$Q11.$Q12.$Q13;

            if($quizz === $rep_quizz)
            {
                $message ="Félicitations vous avez terminé le remue-méninge : Quizz.";
                $alert = $this->renderView('AppBundle:Eleve:alert.html.twig',array('message'=>$message));
                $userManager = $this->get('fos_user.user_manager');
                $user = $this->getUser();
                $user->setLevel3(true);

                $level2 = $user->getLevel2();
                $level3 = $user->getLevel3();

                if($level2 === true  && $level3 === true){
                    $user->setLevel4(true);
                }

                $userManager->updateUser($user);
                return new JsonResponse(array('alert'=>$alert));
            }
            else{
                $message ="Veuillez vérifier vos réponses.";
                $alert = $this->renderView('AppBundle:Eleve:error.html.twig',array('message'=>$message));
                return new JsonResponse(array('error_rep'=>$alert));
            }
        }

        return $this->render('@App/Eleve/quizz.html.twig');
    }

    /**
     * @Route("eleve/notes", name="eleve_notes")
     */
    public function eleveNotes(Request $request)
    {
        /*if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ELEVE')) {
            return $this->redirectToRoute('home');
        }*/

        $user = $this->getUser();
        $notes = $user->getNotes();

        return  $this->render('@App/Eleve/notes.html.twig',array('notes'=>$notes));

    }

    /**
     * @Route("eleve/notes/ajout", name="eleve_notes_ajout")
     */
    public function eleveNotesAjout(Request $request)
    {
        /*if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ELEVE')) {
            return $this->redirectToRoute('home');
        }*/

        $note = new Note();
        $form_create = $this->createForm(NoteType::class,$note);
        $form_create->handleRequest($request);

        if($form_create->isSubmitted() && $form_create->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();
            $note->setUser($user);
            $em->persist($note);
            $em->flush();

            return $this->redirectToRoute('eleve_notes');
        }
        return $this->render('@App/Eleve/notes_ajout.html.twig',array('form_create'=>$form_create->createView()));
    }

    /**
     * @Route("eleve/notes/modification/{id}", name="eleve_notes_modification")
     */
    public function eleveNotesModification(Note $note, Request $request)
    {
        $form_update = $this->createForm(NoteType::class,$note);
        $form_update->handleRequest($request);
        if($form_update->isSubmitted() && $form_update->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('eleve_notes');
        }

        $id = $note->getId();

        return $this->render('@App/Eleve/notes_modification.html.twig',array('id'=>$id,'form_update'=>$form_update->createView()));
    }

    /**
     * @Route("eleve/notes/suppression/{id}", name="eleve_notes_suppression")
     */
    public function eleveNotesSuppression(Note $note)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($note);
        $em->flush();

        return $this->redirectToRoute('eleve_notes');
    }
}