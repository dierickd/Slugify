># Slugify

Le service **Slugify** permet de convertir une chaine de caractère en slug, il est simple d'utilisation et rapide à mettre en place.

## Installation
Copier simplement le fichier [slugify](https://github.com/dierickd/Slugify/blob/main/Slugify.php) dans un service  

## Usage

paramètre: _string_  
sortie: _string_
  
*******************
  
    
Usage dans un controller symfony:

```php

#[Route('/new', name: 'project_new', methods: ['GET', 'POST'])]
public function new(Request $request, Slugify $slugify): Response
{
  $project = new Project();
  $form = $this->createForm(ProjectType::class, $project);
  $form->handleRequest($request);

  if ($form->isSubmitted() && $form->isValid()) {
     $entityManager = $this->getDoctrine()->getManager();
     
     /** Le nom du projet est récupéré et transformé en slug avant d'être persisté */
     $project->setSlug($slugify->generate($project->getName()));
     $entityManager->persist($project);
     $entityManager->flush();

     $this->addFlash('success', "Sauvegardé avec succès");
     return $this->redirectToRoute('project_index');
  }

  return $this->render('admin/project/new.html.twig', [
     'project' => $project,
     'form' => $form->createView(),
  ]);
}

```


```php
$slugify->generate("Jérôme Larchet")
// Ouput
// jerome-larchet
```

```php
$slugify->generate("La route d'où je viens")
// Ouput
// la-route-dou-je-viens
```

```php
$slugify->generate("Les 2 chats qui buvaient !")
// Ouput
// les-2-chats-qui-buvaient
```





