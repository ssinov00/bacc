<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Upload extends Model
{
    use \Rutorika\Sortable\SortableTrait;

	protected static $sortableGroupField = ['type', 'category'];

	public function delete()
	{
		parent::delete();
		File::delete($this->path);
		File::delete($this->thumbnail);
	}
}
