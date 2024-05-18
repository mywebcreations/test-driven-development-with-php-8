<?php

namespace App\Tests\Integration\Service;

use App\Entity\Consumption;
use App\Service\ConsumptionService;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

// class ConsumptionServiceTest extends TestCase
class ConsumptionServiceTest extends KernelTestCase

{
    public function testCanComputeAndSave(): void
    {
        // self::fail("--- RED ---");
        $name = "Ade";
        $morningCoffee = 2;
        $afternoonCoffee = 3;
        $eveningCoffee = 1;
        // Expected Total
        $expectedTotalCups = $morningCoffee+$afternoonCoffee+$eveningCoffee;

        // Test Step 1: Get the Symfony's service container:
        $container = static::getContainer();

        // Test Step 2: Use PSR-11 standards to get an instance of our service, 
        // pre-injected with the EntityManager:
        /**
         * @var ConsumptionService $consumptionService
         */
        $consumptionService = $container->get(ConsumptionService::class);
        // $consumptionService = new ConsumptionService();
        
        // Test Step 3: Run the method we want to test for:
        $persistedId = $consumptionService->calculateAndSave(
            $name, 
            $morningCoffee,
            $afternoonCoffee,
            $eveningCoffee
        );
        
        // Test step 4: Verify if the data persisted is correct:
        $entityMananger = $consumptionService->getManagerRegistry()->getManager();
        $recordFromDb = $entityMananger->find(Consumption::class, $persistedId); //see comment on https://businessascend.atlassian.net/browse/SSM-23
        
        //assert that id's are equal
        self::assertEquals($persistedId, $recordFromDb->getId());

        //assert that the name properties are equal
        self::assertEquals($name, $recordFromDb->getName());

        //assert that the total cups of coffee are equal
        self::assertEquals($expectedTotalCups, $recordFromDb->getTotal());

        
    }
}