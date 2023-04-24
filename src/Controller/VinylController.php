<?php

namespace App\Controller;

use App\Repository\VinylMixRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    /**
     * @Route("/")
     */
    #[Route(path: '/', name: 'home', methods: ['GET'])]
    public function homepage(): Response
    {
        $tracks = [
            [ 'song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            [ 'song' => 'Waterfalls', 'artist' => 'TLS'],
            [ 'song' => 'Creep', 'artist' => 'Radiohead'],
            [ 'song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            [ 'song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            [ 'song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];

        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB &Jams',
            'tracks' => $tracks,
        ]);
    }

    #[Route("/browse/{slug}", name:"browse")]    
    public function browse(VinylMixRepository $mixRepository, string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        $mixes = $mixRepository->findAllOrderedByVotes($slug);

//        $mixes = $cache->get('mixes-data', function(CacheItemInterface $cacheItem) use ($httpClient){
//            $cacheItem->expiresAfter(5);
//            $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/SymfonyCasts/vinyl-mixes/main/mixes.json');
//            return $response->toArray();
//        });
        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre,
            'mixes' => $mixes,
        ]);
    }

    
}

