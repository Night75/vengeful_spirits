<?php

namespace VS\VitrineBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VS\VitrineBundle\Entity\Article;
use VS\VitrineBundle\Entity\ArticleManager;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{
		$article = new Article();
		$article->setTitle("Guide des pouvoirs du sorcier");
		$article->setContent("On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour 'Lorem Ipsum' vous conduira vers de nombreux sites qui n'en sont encore qu'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d'y rajouter de petits clins d'oeil, voire des phrases embarassantes.");
		$article->setImage("legacy_wp2.jpg");
		$article->setAuthor($em->merge($this->getReference('super-admin')));
		$em->persist($article);
		
		$article = new Article();
		$article->setTitle("Meilleur parrain du mois");
		$article->setContent("Plusieurs variations de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure partie d'entre elles a été altérée par l'addition d'humour ou de mots aléatoires qui ne ressemblent pas une seconde à du texte standard. Si vous voulez utiliser un passage du Lorem Ipsum, vous devez être sûr qu'il n'y a rien d'embarrassant caché dans le texte. Tous les générateurs de Lorem Ipsum sur Internet tendent à reproduire le même extrait sans fin, ce qui fait de lipsum.com le seul vrai générateur de Lorem Ipsum. Iil utilise un dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures de phrases, pour générer un Lorem Ipsum irréprochable. Le Lorem Ipsum ainsi obtenu ne contient aucune répétition, ni ne contient des mots farfelus, ou des touches d'humour.");
		$article->setImage("Coolest-dog-leash.jpg");
		$article->setAuthor($em->merge($this->getReference('admin-1')));
		$em->persist($article);
		
		$article = new Article();
		$article->setTitle("Comment vaincre Brutus le pegase noir?");
		$article->setContent("In each event, you have access to a LifecycleEventArgs object, which gives you access to both the entity object of the event and the entity manager itself.
One important thing to notice is that a listener will be listening for all entities in your application. So, if you're interested in only handling a specific type of entity (e.g. a Product entity but not a BlogPost entity), you should check for the class name of the entity in your method (as shown above).");
		$article->setImage("dark_pegasus_by_arturszott-d4mkge3.png");
		$article->setAuthor($em->merge($this->getReference('admin-2')));
		$em->persist($article);
		
		$article = new Article();
		$article->setTitle("A la decouverte de nouveaux horizons!");
		$article->setContent("Etiam eros enim, rhoncus ac molestie non, pulvinar quis dolor. Duis ultricies dictum nisl, eget tincidunt libero feugiat in. Nunc ac nulla arcu, et accumsan nisl. Praesent lacus sapien, ornare non iaculis sed, mattis et elit. Nunc pulvinar, lacus id sodales ultrices, felis mi sollicitudin nibh, ac venenatis sapien augue id magna. Quisque eu varius massa. Praesent euismod sagittis elit eu auctor. Duis consequat porttitor justo, vitae ultrices dolor bibendum at. Nunc fringilla aliquam mi a venenatis. Cras vitae volutpat tellus. Mauris molestie justo in purus venenatis sollicitudin. Maecenas vel mi libero, dapibus feugiat libero. Pellentesque cursus egestas elementum. Integer iaculis nisi at ante luctus euismod. Nullam eu neque varius libero eleifend mattis quis sed mauris. Donec at nulla imperdiet velit accumsan hendrerit at a nibh.");
		$article->setImage("Colourfull-Forest.jpg");
		$article->setAuthor($em->merge($this->getReference('super-admin')));
		$em->persist($article);
		
		for($i = 5; $i< 10; $i++){
			$article = new Article();
			$article->setTitle("Titre numéro {$i}");
			$article->setContent("am eros enim, rhoncus ac molestie non, pulvinar quis dolor. Duis ultricies dictum nisl, eget tincidunt libero feugiat in. Nunc ac nulla arcu, et accumsan nisl. Praesent lacus sapien, ornare non iaculi");	
			$article->setAuthor($em->merge($this->getReference('super-admin')));
			$em->persist($article);
		}
		$em->flush();
	}
	
	public function getOrder()
	{
		return 10;
	}
}