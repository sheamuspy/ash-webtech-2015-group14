#suppliers.php class reference

# supplier Class #

A class to interface with webtech\_project\_supplier table


## Fields ##

## Methods ##

### get\_suppliers() ###
Returns all the suppliers

### suppliers() ###
Constructor method

### add\_supplier($name, $address, $number) ###
Adds a new supplier

### search\_suppliers($search\_text) ###
Returns all suppliers whose names contain **$search\_text**

### get\_supplier($id) ###
Returns the supplier with id **$id**

### edit\_supplier($id, $name, $address, $number) ###
Updates the fields of the supplier with id **$id**

### delete\_supplier($id) ###
Deletes the supplier with id **$id**

### get\_all\_supplier() ###
Return all suppliers