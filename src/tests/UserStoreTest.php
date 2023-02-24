<?php

namespace education\classes\test;

use PHPUnit\Framework\TestCase;
class UserStoreTest extends TestCase
{
    private UserStore $store;
    protected function setUp(): void
    {
        $this->store = new UserStore();
    }

    protected function tearDown(): void
    {
    }

    public function testGetUser(): void
    {
        $this->store->addUser('bob wiliams', 'a@b.com', '12345');

        $user = $this->store->getUser('a@b.com');
        $this->assertEquals('a@b.com', $user->getMail());
    }

    public function testAddUserShortPass(): void
    {
        $this->expectException(\Exception::class);
        $this->store->addUser('bob wiliams', 'bob@example.com', 'ff');
    }

    public function testAddUserDuplicate(): void
    {
        try
        {
            $ret = $this->store->addUser('bob wiliams', 'a@b.com', '12345');
            $ret = $this->store->addUser('bob wiliams', 'a@b.com', '12345');

            $this->fail('Должно быть вызвано исключение');
        }
        catch (\Exception)
        {
            $const = $this->logicalAnd(
                $this->logicalNot(
                    $this->containsEqual('bob stevens')
                ),
                $this->isType('object'),
            );
            $this->AssertThat($this->store->getUser('a@b.com'), $const);
        }
    }
}