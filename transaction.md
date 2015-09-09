#transaction.php class

# transaction Class #

A class to interface with the webtech\_project\_transactions table

## Fields ##

## Methods ##

### transaction() ###
Constructor method

### add\_transaction($user\_id, $equipment\_id, $purpose) ###
Adds a new transaction to the database

### select\_transaction() ###
Returns all the transaction in the store

### select\_transactions\_by\_date($date) ###
Return all transactions that have the date **$date**

### select\_transactions\_by\_equipment($equipment) ###
Return all transactions that have the equipment name **$equipment**

### select\_transactions\_by\_name($username) ###
Return all transactions that have the username **$username**

### get\_transaction($id) ###
Return the transaction with the id **$id**
Return the transaction with id **$id**