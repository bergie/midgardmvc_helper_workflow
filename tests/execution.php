<?php
class midgardmvc_helper_workflow_tests_execution extends midgardmvc_core_tests_testcase
{
    public function setUp()
    {
        parent::setUp();
        midgardmvc_core::get_instance()->component->load_library('Workflow');
    }

    public function test_resume()
    {
        $workflow = new ezcWorkflow('inputTest');

        $input = new ezcWorkflowNodeInput(
            array(
                'mixedVar' => new ezcWorkflowConditionIsAnything,
            )
        );
        $input->addOutNode( $workflow->endNode );
        $workflow->startNode->addOutNode( $input );

        $execution = new midgardmvc_helper_workflow_execution_interactive($workflow);

        $id = $execution->start();
        $this->assertNotNull($id);
        $this->assertFalse($execution->hasEnded());
        $this->assertFalse($execution->isResumed());
        $this->assertFalse($execution->isCancelled());
        $this->assertTrue($execution->isSuspended());
        $guid = $execution->guid;

        $execution = new midgardmvc_helper_workflow_execution_interactive($workflow, $guid);
        $this->assertFalse($execution->hasEnded());
        $this->assertFalse($execution->isResumed());
        $this->assertFalse($execution->isCancelled());
        $this->assertTrue($execution->isSuspended());

        $execution->resume(array('mixedVar' => true));
        $this->assertFalse($execution->isResumed());
        $this->assertFalse($execution->isCancelled());
        $this->assertFalse($execution->isSuspended(), "Should not be suspended after resume");
        $this->assertTrue($execution->hasEnded(), "Should be finished");
    }
}
