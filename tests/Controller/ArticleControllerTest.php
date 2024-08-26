<?php

namespace App\Test\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/article/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Article::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Article index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'article[Title]' => 'Testing',
            'article[Text]' => 'Testing',
            'article[CreateDate]' => 'Testing',
            'article[UpdateDate]' => 'Testing',
            'article[PublishedDate]' => 'Testing',
            'article[IsPublished]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Article();
        $fixture->setTitle('My Title');
        $fixture->setText('My Title');
        $fixture->setCreateDate('My Title');
        $fixture->setUpdateDate('My Title');
        $fixture->setPublishedDate('My Title');
        $fixture->setIsPublished('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Article');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Article();
        $fixture->setTitle('Value');
        $fixture->setText('Value');
        $fixture->setCreateDate('Value');
        $fixture->setUpdateDate('Value');
        $fixture->setPublishedDate('Value');
        $fixture->setIsPublished('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'article[Title]' => 'Something New',
            'article[Text]' => 'Something New',
            'article[CreateDate]' => 'Something New',
            'article[UpdateDate]' => 'Something New',
            'article[PublishedDate]' => 'Something New',
            'article[IsPublished]' => 'Something New',
        ]);

        self::assertResponseRedirects('/article/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitle());
        self::assertSame('Something New', $fixture[0]->getText());
        self::assertSame('Something New', $fixture[0]->getCreateDate());
        self::assertSame('Something New', $fixture[0]->getUpdateDate());
        self::assertSame('Something New', $fixture[0]->getPublishedDate());
        self::assertSame('Something New', $fixture[0]->getIsPublished());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Article();
        $fixture->setTitle('Value');
        $fixture->setText('Value');
        $fixture->setCreateDate('Value');
        $fixture->setUpdateDate('Value');
        $fixture->setPublishedDate('Value');
        $fixture->setIsPublished('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/article/');
        self::assertSame(0, $this->repository->count([]));
    }
}
