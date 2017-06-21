    public function findOrderedByAge()
    {
        return $this->getEntityManager()
            ->createQuery('
                SELECT p 
                FROM AppBundle:Player p 
                ORDER BY p.age ASC
            ')
            ->getResult();
    }


    
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

$encoder = array(new JsonEncoder());
$normalizer = array(new ObjectNormalizer());
$serializer = new Serializer($normalizer, $encoder);

$jsonContent = $serializer->serialize($teams, 'json');