<?php

namespace education\classes\test;
use PHPUnit\Framework\TestCase;
class ValidatorTest extends TestCase
{
    private Validator $validator;
    protected function setUp(): void
    {
        $store = new UserStore();
        $store->addUser('bob wiliams', 'bob@example.com', '12345');
        $this->validator = new Validator($store);
    }

    public function testValidateCorrectPass(): void
    {
        $this->assertTrue(
            $this->validator->validateUser('bob@example.com', '12345'), 'Ожидается успешная проверка'
        );
    }

//    public function testValidateFalsePass(): void
//    {
//        $store = $this->createMock(UserStore::class);
//        $this->validator = new Validator($store);
//
//        $store->expects($this->once())
//                ->method('notifyPasswordFailure')
//                ->with($this->equalTo('bob@example.com'));
//
//        $store->expects($this->any())
//                ->method('getUser')
//                ->with($this->returnValue([
//                        'name' => 'bob wiliams',
//                        'mail' => 'bob@example.com',
//                        'pass' => 'right'
//        ]));
//
//
//        $this->validator->validateUser('bob@example.com', 'wrong');
//    }
}