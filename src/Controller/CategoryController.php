<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use App\Repository\ProgramRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/category', name: 'category_')] 
class CategoryController extends AbstractController
{
    #[Route('/', name:'index') ]
    public function index(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', ['categories' => $categories]);
    }

    #[Route ('/{categoryName}', name:'show')] 
    public function show(CategoryRepository $categoryRepository, ProgramRepository $programRepository, string $categoryName)
    {
        $category = $categoryRepository->findOneBy(['name' => $categoryName]);
        
        

         if (!$category) {
             throw $this->createNotFoundException(
                 $categoryName.' not found in category\'s table.'
             );
         }

         $programs = $programRepository->findBy(['category' => $category], [ 'id' => 'DESC'], 3);

         return $this->render('category/show.html.twig', [
             'category' => $category,
             'programs' => $programs
         ]);

    }
}