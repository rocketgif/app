<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151010142844 extends AbstractMigration implements ContainerAwareInterface
{
    /**
     * The Symfony container used to launch the post:update-urls command
     *
     * @var ContainerInterface|null
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post ADD webm_url VARCHAR(255) NOT NULL, ADD mp4_url VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE submission ADD webm_url VARCHAR(255) NOT NULL, ADD mp4_url VARCHAR(255) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function postUp(Schema $schema)
    {
        $this->updatePostUrls();
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post DROP webm_url, DROP mp4_url');
        $this->addSql('ALTER TABLE submission DROP webm_url, DROP mp4_url');
    }

    /**
     * Update all post webm and mp4 urls by launching the appropriate command
     */
    private function updatePostUrls()
    {
        $kernel      = $this->container->get('kernel');
        $application = new Application($kernel);
        $application->setAutoExit(false);

        $input  = new ArrayInput([
           'command' => 'rocketgif:post:update-urls',
        ]);
        $output = new NullOutput();
        $application->run($input, $output);
    }
}
