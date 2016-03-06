<?php
var_dump((int) "10.5");                    // int(10)
var_dump((float) "10.5");                  // float(10.5)
var_dump((int) "-1.3e3");                  // int(-1)
var_dump((float) "-1.3e3");                // float(-1300)
var_dump((int) "bob3");                    // int(0)
var_dump((float) "bob3");                  // float(0)
var_dump((int) "10.2 Little Piggies");     // int(10)
var_dump((float) "10.2 Little Piggies");   // float(10.2)