<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace DigitalWise\AdultCustomer\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class IsAdult extends Command
{

    public function __construct(
        \DigitalWise\AdultCustomer\Cron\IsAdult $isAdult
    ) {
        $this->isAdult = $isAdult;
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $this->isAdult->execute();
        $output->writeln("finished checking");
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName("digitalwise_adultcustomer:isadult");
        $this->setDescription("is adult check");
        parent::configure();
    }
}

