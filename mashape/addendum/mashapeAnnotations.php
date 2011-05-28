<?php
require_once "annotations.php";

//
// Methods annotations
//

/** @Target("method") */
class GET extends Annotation { }
/** @Target("method") */
class POST extends Annotation { }
/** @Target("method") */
class PUT extends Annotation { }
/** @Target("method") */
class DELETE extends Annotation { }

/** @Target("method") */
class Route extends Annotation { }
/** @Target("method") */
class Result extends Annotation { }
class ResultArray extends Annotation { }