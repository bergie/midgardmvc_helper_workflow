<?php
/**
 * @package midgardmvc_helper_workflow
 * @author The Midgard Project, http://www.midgard-project.org
 * @copyright The Midgard Project, http://www.midgard-project.org
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License
 */

/**
 * Workflow definition interface for Midgard MVC
 *
 * @package midgardmvc_helper_workflow
 */
interface midgardmvc_helper_workflow_definition
{
    /**
     * Check if the workflow can handle a particular object instance
     */
    public function can_handle(midgard_object $object);

    /**
     * Get the workflow definition
     */
    public function get();

    /**
     * Start the workflow for a particular object instance
     */
    public function start(midgard_object $object, array $args = null);

    /**
     * Resume a workflow execution
     */
    public function resume($execution_guid, array $args = null);
}
