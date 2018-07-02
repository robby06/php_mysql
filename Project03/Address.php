<?php
class Address
{
   // Instance attributes
   private $name         = array('FIRST'=>"", 'LAST'=>""); 
   private $street       = '';
   private $city         = '';
   private $state        = '';
   private $country      = '';
   private $zip          = '';
   
   // Operations
   // name() prototypes:
   //   string name()                          returns name in "Last, First" format.
   //                                          If no first name assigned, then return in "Last" format.
   //                                         
   //   void name(string $value)               set object's $name attribute in "Last, First" 
   //                                          or "Last" format.
   //                                         
   //   void name(array $value)                set object's $name attribute in [first, last] format
   //
   //   void name(string $first, string $last) set object's $name attribute
   function name() 
   {
     // string name()
     if( func_num_args() == 0 )
     {
       if( empty($this->name['FIRST']) ) return $this->name['LAST'];
       else                              return $this->name['LAST'].', '.$this->name['FIRST']; 
     }
     
     // void name($value)
     else if( func_num_args() == 1 )
     {
       $value = func_get_arg(0);
       
       if( is_string($value) ) 
       {
         $value = explode(',', $value); // convert string to array 
         
         if ( count($value) >= 2 ) $this->name['FIRST'] = htmlspecialchars(trim($value[1]));
         else                      $this->name['FIRST'] = '';
         
         $this->name['LAST']  = htmlspecialchars(trim($value[0]));          
       }
       
       else if( is_array ($value) )
       {
         if ( count($value) >= 2 ) $this->name['LAST'] = htmlspecialchars(trim($value[1]));
         else                      $this->name['LAST'] = '';
         
         $this->name['FIRST']  = htmlspecialchars(trim($value[0])); 
       }         
     }
     
     // void name($first_name, $last_name)
     else if( func_num_args() == 2 )
     {
         $this->name['FIRST'] = htmlspecialchars(trim(func_get_arg(0)));
         $this->name['LAST']  = htmlspecialchars(trim(func_get_arg(1))); 
     }
     
     return $this;
   }
   
   
   
   function street() 
   {  
     if( func_num_args() == 0 )
     {
       return $this->street;
     }
     
     else if( func_num_args() == 1 )
     {
       $this->street = htmlspecialchars(trim(func_get_arg(0)));
     }
     
     return $this;
   }
   
   
   
   function city() 
   {  
     if( func_num_args() == 0 )
     {
       return $this->city;
     }
     
     else if( func_num_args() == 1 )
     {
       $this->city = htmlspecialchars(trim(func_get_arg(0)));
     }
     
     return $this;
   }
   
   
   
   function state() 
   {  
     if( func_num_args() == 0 )
     {
       return $this->state;
     }
     
     else if( func_num_args() == 1 )
     {
       $this->state = htmlspecialchars(trim(func_get_arg(0)));
     }
     
     return $this;
   }
   
   
   
   function country() 
   {  
     if( func_num_args() == 0 )
     {
       return $this->country;
     }
     
     else if( func_num_args() == 1 )
     {
       $this->country = htmlspecialchars(trim(func_get_arg(0)));
     }
     
     return $this;
   }
   
   
   
   function zip() 
   {  
     if( func_num_args() == 0 )
     {
       return $this->zip;
     }
     
     else if( func_num_args() == 1 )
     {
       $this->zip = htmlspecialchars(trim(func_get_arg(0)));
     }
     
     return $this;
   }
   
   
   
   function __construct($name="", $street="", $city="", $state="", $country="", $zip="")
   {
     // delegate setting attributes so validation logic is applied
     $this->name($name);
     $this->street($street);
     $this->city($city);
     $this->state($state);
     $this->country($country);
     $this->zip($zip);
   }
   
   
   
   function __toString()
   {
     return (var_export($this, true));
   }
   
   
   
   // Returns a tab separated value (TSV) string containing the contents of all instance attributes   
   function toTSV()
   {
       return implode("\t", [$this->name(), $this->street(), $this->city(), $this->state(), $this->country(), $this->zip()]);
   }
   
   
   
   // Sets instance attributes to the contents of a string containing ordered, tab separated values 
   function fromTSV(string $tsvString)
   {
     // assign each argument a value from the tab delineated string respecting relative positions
     list($name, $street, $city, $state, $country, $zip) = explode("\t", $tsvString);
     $this->name($name);
     $this->street($street);
     $this->city($city);
     $this->state($state);
     $this->country($country);
     $this->zip($zip);
   }
} // end class Address

?>

