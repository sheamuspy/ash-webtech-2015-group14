A class that contains all the SQL queries required for the project

Methods

Add\_equipment($sn, $in, $name, $lid, $dp, $sid, $desc)

Runs a query that will add a new equipment into the database. Its parameters include the name of the equipment, serial number, inventory number, date purchased, supplier id and description of the equipment

edit\_equipment($sn, $in, $name, $lid, $dp, $sid, $desc)

This function takes in the set parameters then updates the current data set according to the user and returns the updated data set.

delete\_equipment($eid)

Runs a query takes in a parameter $eid , calls the data attached to the $id and then deletes the record.

Search\_equipment($search\_text)

Returns a record that has an equipment name with the name like the text the user has input.

display\_equipment()

Displays an equipment in the database that and gives the user more details about the equipment.