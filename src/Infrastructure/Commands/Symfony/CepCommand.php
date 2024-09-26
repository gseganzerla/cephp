<?php


namespace App\Infrastructure\Commands\Symfony;

use App\Application\Services\Cep\Contracts\CepService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('cep')]
class CepCommand extends Command
{

    public function __construct(private readonly CepService $cepService)
    {
        parent::__construct();
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        /** @var string $cep*/
        $cep = $input->getArgument('cep');

        $response = $this->cepService->findByCep($cep);

        $table = new Table($output);

        $table->setHeaders(['Cep', 'State', 'City', 'Neighborhood', 'Street']);
        $table->setRows(
            [
                [
                    $response->cep,
                    $response->state,
                    $response->city,
                    $response->neighborhood,
                    $response->street
                ]
            ]
        );

        $table->render();

        return self::SUCCESS;
    }

    protected function configure(): void
    {
        $this
            ->setDescription("Fetch information about the given cep")
            ->addArgument('cep', InputArgument::REQUIRED, 'The given cep')
            ->setHelp('<cep> To fetch information about the given cep');
    }
}