<?php

namespace Phing\Task\Ext\ZendGuard;

use Phing\Project;
use Phing\Type\FileSet as BaseFileSet;

/**
 * This is a FileSet with the to specify permissions.
 *
 * Permissions are currently not implemented by PEAR Archive_Tar,
 * but hopefully they will be in the future.
 *
 * @package phing.tasks.ext.zendguard
 */
class FileSet extends BaseFileSet
{
    private $files = null;

    /**
     *  Get a list of files and directories specified in the fileset.
     * @param Project $p
     * @param bool $includeEmpty
     * @throws \Phing\Exception\BuildException
     * @return array a list of file and directory names, relative to
     *               the baseDir for the project.
     */
    public function getFiles(Project $p, $includeEmpty = true)
    {

        if ($this->files === null) {

            $ds = $this->getDirectoryScanner($p);
            $this->files = $ds->getIncludedFiles();
        } // if ($this->files===null)

        return $this->files;
    }

}