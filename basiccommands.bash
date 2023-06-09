#!/bin/bash
### MUOS Bash script assignment ###
### By: Arwain Davies 17/5/2023 ###



clear
endInput=0                          #sets exit input false
until [ $endInput -eq 1 ]; do       #when exit inout = true end the script
    echo -e "Select Command:"		#prompts user for to select a command a command
		echo "1 ) View File"
		echo "2 ) Delete File"
		echo "3 ) View system processes"
		echo "4 ) View Home directory"
		echo "5 ) Exit"
		read userInput              #reads userInput selection

        case $userInput in          #runs function based on userInput selection
        1) 
            clear
            echo "you selected View File."
            echo "==================== Location ===================="   #generates a GUI for the user to understand current directory and avalible files for selection
            tree
            echo "Please select the file you wish to view"		
		    read path	        #selects file user wishes to view
	
		if [ -f $path ]; then       #if selection exists show word count and display file contents to the screen with line numbers
            clear
            echo -n "wordcount:"
            wc  -w < $path
            cat -n $path
            echo "

            
            "

			

		else        #if file selection does not exists informs user that the file could not be found
			clear
            echo "File: $path could not be found make sure you add file extention and check spelling."
            echo "

            
            "
		fi
        ;;
        2) 
            clear
            echo "==================== Location ===================="       #generates a GUI for the user to understand current directory and avalible files for selection
            tree
            echo "Please select the file you wish to delete"		#select file user wishes to delete
		    read path
                        
            if [ -f $path ]; then       #if the file exists delete it
            clear
            echo -n "File:$path deleted."
            rm $path
            echo "

            
            "

		else        #if file selection does not exists informs user that the file could not be found
			clear
            echo "File: $path could not be found make sure you add file extention and check spelling."  
            echo "

            
            "
		fi
        ;;
        3)
            clear
            echo "System processes"         #shows system processes.
            ps
            echo "

            
            "
        ;;
        4)
            clear
            echo "Root directory"       #displays root directory
            tree ~
            echo "

            
            "

        ;;
        5)      
            clear                   #sets exit input = ture ending the script
            endInput=1
        ;;
        *)
            clear                   #all other menu inputs returned as "invalid input"
            echo "invalid input."
        ;;
        esac

done