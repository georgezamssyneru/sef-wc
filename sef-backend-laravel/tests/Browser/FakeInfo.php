<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;

class FakeInfo
{
    /*
     * Generate a fake user for testing purposes, first name is empty for the purpose of this test.
     * 
     * @return \stdClass $user - The user anonymous object that is created.
     */
    public static function generateUser()
    {
        $user = new \stdClass();
        $user->firstName = FakeInfo::generateRandomName();
        $user->lastName = FakeInfo::generateRandomName();
        $user->email = $user->firstName.'.'.$user->lastName.'@email.com';
        $user->password = 'v@lid_P@SS1945';
        $user->confirmPassword = 'v@lid_P@SS1945';
        return $user;
    }

    /*
     * The main logic behind the first and last name generation, in most cases you can use 'invalidateFirstName' or 'invalidateLastName'
     * as it is built ontop of this one
     * 
     * @param boolean $contains_number - the name will contain a number
     * @param boolean $contains_special_char - the name will contain a special character
     * @param boolean $contains_unicode - the name will contain a unicode character
     * @return string $name - the generated name
     */
    private function generateInvalidName($contains_number=False, $contains_special_char=False, $contains_unicode=False)
    {
        $name = "";

        #Randomly pick 1 uppercase letter or lower case letter and append to $name
        $name .= (rand(0, 1) == 0) ? chr(rand(65, 90)) : chr(rand(97, 122));
        $nameLength = rand(5, 7);
        while (true)
        {
            #Randomly pick a number or special character and append to $name
            $name .= (rand(0, 1) == 0) ? chr(rand(65, 90)) : chr(rand(97, 122));
            
            #Append a random number of lowercase letters to $name
            if ($contains_number == True)
                $name .= rand(0, 9);
            
            #Append a random special characters to $name
            if ($contains_special_char == True)
            {
                $special_array = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "+", "=", ":", ";", "\"", "'", ",", ".", "/", "?", ">", "<", "|");
                $name .= $special_array[rand(0, count($special_array) - 1)];
            }
            
            #Append a unicode characters to $name
            if ($contains_unicode == True)
                $name .= FakeInfo::random_unicode(1);
            
            #If $name is longer than $nameLength, break out of the loop
            if (strlen($name) >= $nameLength)
                break;
        }
        return $name;
    }

    /*
     * Invalidates the first name of the user
     * 
     * @param \stdClass $user - the user anonymous object to be invalidated
     * @return \stdClass $user - The user anonymous object with the invalid first name
     */
    public static function invalidateFirstName($user)
    {

        #Randomly pick the type of invalid name to generate
        $name_choice = array(
            0 => [True, False, False], #generateInvalidName(False, True, True),
            1 => [False, True, False], #generateInvalidName(True, False, True),
            2 => [False, False, True]  #generateInvalidName(True, True, False)
        );
        
        $random_choice = $name_choice[rand(0, count($name_choice) - 1)];
        $user->firstName = generateInvalidName($random_choice[0], $random_choice[1], $random_choice[2]);
        return $user;
    }

    /*
     * Invalidates the last name of the user
     * 
     * @param \stdClass $user - the user anonymous object to be invalidated
     * @return \stdClass $user - The user anonymous object with the invalid last name
     */
    public static function invalidateLastName($user)
    {
        $tempStoreFirstName = $user->firstName;
        $user = FakeInfo::invalidateFirstName($user);
        $invalidName = $user->firstName;
        $user->firstName = $tempStoreFirstName;
        $user->lastName = $invalidName;
        return $user;
    }
    
    /*
     * A function that will invalidate the users email address
     * 
     * @param \stdClass $user  - the user anonymous object to be invalidated
     * @return \stdClass $user  - the user anonymous object with the invalid email address
     */
    public static function invalidateEmail($user)
    {
        $domain_array = array('gmail.com', 'yahoo.com', 'hotmail.com', 'aol.com', 'outlook.com', 'mail.com', 'onemail.com', 'testmail.com');
        $domain_double_dots_array = array('gmail..com', 'yahoo..com', 'hotmail..com', 'aol..com', 'outlook..com', 'mail..com', 'onemail..com', 'testmail..com');
        $domain_triple_dots_array = array('gmail...com', 'yahoo...com', 'hotmail...com', 'aol...com', 'outlook...com', 'mail...com', 'onemail...com', 'testmail...com');
        $specialChars = array("\"", "(", ")", ",", ":", ";", "[", "\\", "]");
        $domain = $domain_array[rand(0, count($domain_array) - 1)];
        $domain_double_dots = $domain_double_dots_array[rand(0, count($domain_double_dots_array) - 1)];
        $domain_triple_dots = $domain_triple_dots_array[rand(0, count($domain_triple_dots_array) - 1)];        
        
        $option0 = FakeInfo::generateRandomName();
        $option1 = implode("@", str_split(FakeInfo::generateRandomName()));
        $option2 = implode($specialChars[rand(0, count($specialChars) - 1)], str_split(FakeInfo::generateRandomName(false))).'.'.implode($specialChars[rand(0, count($specialChars) - 1)], str_split(FakeInfo::generateRandomName(false)));
        $option3 = FakeInfo::generateRandomName(false)."\"".FakeInfo::generateRandomName(false)."\"".FakeInfo::generateRandomName(false);
        $option4 = FakeInfo::generateRandomName(false)."\"".FakeInfo::generateRandomName(false)."\\".FakeInfo::generateRandomName(false);
        $option5 = FakeInfo::generateRandomName(false)."\\ ".FakeInfo::generateRandomName(false)."\\\"".FakeInfo::generateRandomName(false)."\\".FakeInfo::generateRandomName(false);
        $option6 = FakeInfo::generateRandomName(false)."..".FakeInfo::generateRandomName(false);
        $option7 = FakeInfo::generateRandomName(false)."...".FakeInfo::generateRandomName(false);
        $option8 = FakeInfo::generateRandomName(false).".".FakeInfo::generateRandomName(false);
        $option9 = FakeInfo::generateRandomName(false).".".FakeInfo::generateRandomName(false);
        $option10 = FakeInfo::generateRandomName(false).".".FakeInfo::generateRandomName(false);
        $option11 = FakeInfo::generateRandomName(false).".".FakeInfo::generateRandomName(false);

        $email_choice = array(
            0 => "$option0.$domain", #No @ character
            1 => "$option1@$domain", #Too many @ characters
            2 => "$option2@$domain", #None of the special characters in this local part are allowed outside quotation marks
            3 => "$option3@$domain", #Quoted strings must be dot separated or the only element making up the local part
            4 => "$option4@$domain", #Spaces, quotes, and backslashes may only exist when within quoted strings and preceded by a backslash
            5 => "$option5@$domain", #Even if escaped (preceded by a backslash), spaces, quotes, and backslashes must still be contained by quotes
            6 => "$option6@$domain", #Double dot before @
            7 => "$option7@$domain", #Triple dot before @
            8 => "$option8@$domain_double_dots", #Double dot after @
            9 => "$option9@$domain_triple_dots", #Triple dot after @
            10 => " $option10@$domain", #A valid address with a leading space
            11 =>"$option11@$domain ", #A valid address with a trailing space
        );

        #randomly select an email from the array
        $user->email = $email_choice[rand(0, count($email_choice) - 1)];
        return $user;
    }

    /*
     * The main logic behind the password generation, in most cases you can use 'invalidatePassword'
     * as it is built ontop of this one
     * 
     * @param boolean $validLength - the length of the password to be generated
     * @param boolean $validLowerCase - whether or not to include lowercase letters in the password
     * @param boolean $validUpperCase - whether or not to include uppercase letters in the password
     * @param boolean $validNumbers - whether or not to include numbers in the password
     * @param boolean $validSpecialChars - whether or not to include special characters in the password
     * @return string (the generated password)
     */
    private static function generateInvalidPassword($validLength=False, $validLowercase=False, $validUppercase=False, $validNumber=False, $validSpecialChar=False)
    {
        $password = "";

        $password_length = 4;
        if ($validLength == True)
            $password_length = rand(8, 15);
        
        while (True)
        {                
            if ($validLowercase == True)
                $password .= chr(rand(97, 122));
            
            if ($validUppercase == True)
                $password .= chr(rand(65, 90));

            if ($validNumber == True)
                $password .= rand(0, 9);

            if ($validSpecialChar == True)
            {                    
                switch (rand(1, 3))
                {
                    case 1:
                        $special_array = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "+", "=", ":", ";", "\"", "'", ",", ".", "/", "?", ">", "<", "|");
                        $password .= $special_array[rand(0, count($special_array) - 1)];
                        break;
                    case 2:
                        $password .= " ";
                        break;
                    case 3:
                        $password .= FakeInfo::random_unicode(1);
                        break;
                }
            }

            if (strlen($password) >= $password_length)
            {
                if (strlen($password) > $password_length)
                    $password = substr($password, 0, $password_length);
                break;
            }
        }
        return $password;
    }   

    /*
     * Generates a password that is invalid and will overwrite $user->password.
     * If all paramters are left as their default, then a password will be generated that is invalid.
     * If any parameter is set to true, then a password will be generated according to that parameter selection.
     * 
     * @param boolean $validLength - the length of the password to be generated
     * @param boolean $validLowercase - whether or not to include lowercase letters in the password
     * @param boolean $validUppercase - whether or not to include uppercase letters in the password
     * @param boolean $validNumber - whether or not to include numbers in the password
     * @param boolean $validSpecialChar - whether or not to include special characters in the password
     * @return stdClass $user  - returns the anonymous object $user
     */
    public static function invalidatePassword($user, $validLength=True, $validLowercase=True, $validUppercase=True, $validNumber=True, $validSpecialChar=True)
    {
        if ($validLength == False || $validLowercase == False ||
            $validUppercase == False || $validNumber == False ||
            $validSpecialChar==False)
        {
            $user->password = FakeInfo::generateInvalidPassword($validLength, $validLowercase, $validUppercase, $validNumber, $validSpecialChar);
        }
        else
        {
            $choice = array(
                #Array order is essentially the same order of the
                #parameters in the generateInvalidPassword function
                #length, lowercase, uppercase, number, special
                0 => [False, True, True, True, True],
                1 => [True, False, True, True, True],
                2 => [True, True, False, True, True],
                3 => [True, True, True, False, True],
                4 => [True, True, True, True, False]
            );
            $rChoice = $choice[rand(0, count($choice) - 1)];
            $user->password = FakeInfo::generateInvalidPassword($rChoice[0], $rChoice[1], $rChoice[2], $rChoice[3], $rChoice[4]);
        }
        return $user;
    }

    /*
     * Generates a random name.
     * 
     * @param boolean $validLength - the length of the name to be generated
     * @return string $userName - the generated name
     */
    private static function generateRandomName($validLength = True)
    {
        $userName = "";
        $length = rand(8, 20);
        if ($validLength == False){
            $length = rand(1, 7);
        }

        for ($i = 0; $i < $length; $i++) {
            $userName .= chr(rand(97, 122));
        }
        return ucfirst($userName);
    }

    /*
     * Generates a random unicode character
     * between the range of 256 and 65536 (Mainly because search engines dont use UTF-32 yet)
     * 
     * @param boolean $length - the length of the character to be generated (default is 1)
     * @return string $unicode - the generated unicode character
     */
    public static function random_unicode($length=1) 
    {
        $unicode = "";
        for ($i = 0; $i < $length; $i++) {
            #Unicode can go much further than 65535, currently is counts to 1114110, but for now we'll just use this
            #As it's unlikely anything beyond this will be used, and chrome only support hex FFFF (65535)
            #65535
            $unicode .= trim(mb_chr(rand(256, 65535), 'UTF-16'), " ");
        }

        return $unicode;
    }
}