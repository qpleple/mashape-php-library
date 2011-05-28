<?php
require "annotations.php";

//
// Methods annotations
//

// HTTP methods
class GET extends Annotation { }
class POST extends Annotation { }
class PUT extends Annotation { }
class DELETE extends Annotation { }

class Route extends Annotation { }
class Result extends Annotation { }
    
?>