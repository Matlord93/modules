<?php

namespace Matlord\Modules\Tests;

use Module;

class FacadeTest extends BaseTestCase
{
    /** @test */
    public function it_can_work_with_container()
    {
        $this->assertInstanceOf(\Matlord\Modules\RepositoryManager::class, $this->app['modules']);
    }

    /** @test */
    public function it_can_work_with_facade()
    {
        $this->assertSame('Matlord\Modules\Facades\Module', (new \ReflectionClass(Module::class))->getName());
    }
}