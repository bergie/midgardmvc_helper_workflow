<?php
class midgardmvc_helper_workflow_condition_guid extends ezcWorkflowConditionType
{
    /**
     * Evaluates this condition and returns true if $value is a GUID or false if not.
     *
     * @param  mixed $value
     * @return boolean true when the condition holds, false otherwise.
     * @ignore
     */
    public function evaluate($value)
    {
        return mgd_is_guid($value);
    }

    /**
     * Returns a textual representation of this condition.
     *
     * @return string
     * @ignore
     */
    public function __toString()
    {
        return 'is GUID';
    }
}
