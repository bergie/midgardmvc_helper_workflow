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
     * Run the workflow with a particular object instance
     */
    public function run(midgard_object $object, array $args = null);
}
