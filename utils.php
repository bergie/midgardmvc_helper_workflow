<?php
class midgardmvc_helper_workflow_utils
{
    public static function get_workflows_for_object(midgard_object $object, array $workflows = null)
    {
        if (is_null($workflows))
        {
            $workflows = midgardmvc_core::get_instance()->configuration->workflows;
        }

        $object_workflows = array();
        foreach ($workflows as $workflow_name => $workflow)
        {
            $wf_class = $workflow['provider'];
            $wf = new $wf_class();

            if (!$wf instanceof midgardmvc_helper_workflow_definition)
            {
                throw new Exception("Invalid workflow definition {$workflow_name}: {$wf_class} doesn't implement midgardmvc_helper_workflow_definition");
            }

            $wf->workflow = $workflow;

            if (!$wf->can_handle($object))
            {
                continue;
            }

            $object_workflows[$workflow_name] = array
            (
                'label' => $workflow['label'],
                'provider' => $wf_class,
            );
        }
        return $object_workflows;
    }
}
