<?php

namespace App\Controller;

use Swift;
use App\Entity\Pret;
use App\Form\PretType;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use App\Repository\PretRepository;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AcceuilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(Request $request, ContactRepository $contactRepository, PretRepository $pretRepository, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $pret = new Pret();
        $form = $this->createForm(ContactType::class, $contact);
        $form1 = $this->createForm(PretType::class, $pret);
        $form->handleRequest($request);
        $form1->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $contactRepository->add($contact, true);
            $nom=$contact->getNom();
            $prenom=$contact->getPrenom();
            $sujet=$contact->getObjet();
            $telephone=$contact->getTelephone();
            $message=$contact->getMessage();
            $email=$contact->getEmail();

            $this->addFlash('message', 'Votre message a été envoyer avec succès, vous serez bientôt contacté');
            $email = (new Email())
            ->from('terkibiezo@sobourbank.xyz')
            ->to('terkibiezo@sobourbank.xyz')
            ->subject($sujet)
            ->text("nom:".$nom." "."prenom:".$prenom." "."telephone:".$telephone." "."message:".$message." "."email:".$email  );
            try {
        $mailer->send($email);}catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
          }
            /* $message = new Swift_Message(($subject))
                ->setFrom('terkibiezo@sobourbank.xyz')
                ->setTo($email)
                ->setBody($this->renderView('default/sendemail.html.twig', array('name' => $name)), 'text/html');
            $this->get('mailer')->send($message);*/

            return $this->render('contact/succes.html.twig');
        }
        if ($form1->isSubmitted() && $form1->isValid()) {
            $montant=$pret->getMontant();
            $dure=$pret->getDuree();
            $type=$pret->getType();

            $pretRepository->add($pret, true);

         
            $this->addFlash('message', 'Votre message a été envoyer avec succès, vous serez bientôt contacté');
            $email = (new Email())
            ->from('terkibiezo@sobourbank.xyz')
            ->to('terkibiezo@sobourbank.xyz')
            ->subject("prêt d'argent")
            ->text("montant:".$montant." "."durée du prêt:".$dure." "."type de prêt:".$type  );
            try {
        $mailer->send($email);}catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
          }
            return $this->render('contact/succes.html.twig');
        }
        return $this->render('base.html.twig', [
            'controller_name' => 'AccueilController',
            'contact' => $contact,
            'form' => $form->createView(),
            'form1' => $form1->createView(),
        ]);
    }
}
