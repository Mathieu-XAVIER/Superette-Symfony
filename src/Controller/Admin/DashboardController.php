<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Form\AddProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use http\Env\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
//    #[Route('/admin/shop', name: 'admin')]
//    public function index(): Response
//    {
//        return $this->render('admin/shop.html.twig');
//    }
//
//    #[Route('/admin/shop/create', name: 'add_product', methods:['GET','POST'])]
//    public function create(): Response{
//        return $this->render('admin/create.html.twig');
//    }
//
//    public function store(Request $request, EntityManagerInterface $entityManager){
//        $product = new Product();
//        $form = $this->createForm(AddProductType::class, $product);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $entityManager->persist($product);
//            $entityManager->flush();
//            // do anything else you need here, like send an email
//
//            return $this->redirectToRoute('admin/shop.html.twig');
//        }
//        return $this->render('admin/shop/create.html.twig', [
//            'form' => $form,
//        ]);
//    }

    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(ProductCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('My Project');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Product', 'fas fa-plus', Product::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Products', 'fas fa-eye', Product::class)
        ]);
    }
}
