#labs.php class reference

# **labs Class** #
A class that contains all queries that interface with labs table in database.


## Methods ##

**labs()**

Constructor method

**add\_lab($name, $dept\_head, $location)**

Queries database to insert a new record of a lab.

**search\_labs($search\_text)**

Queries database to return lab(s) identified by search input.

**get\_lab($id)**

Queries database to return a lab identified by an id.

**edit\_lab($id, $name, $dept\_head, $location)**

Queries database to update a record of a lab.

**delete\_lab($id)**

Queries database to delete a record of a lab identified by an id.

**get\_all\_labs()**

Queries database to return all records of labs.