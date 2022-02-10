void activation(char *UserCode)
{

    char querry[200];
    strcpy(querry,"INSERT INTO requests (user_code) values (\'");
    strcat(querry, UserCode);
    strcat(querry, "\')");

    if(mysql_query(conn,querry)){
        printf("!ERROR 276: Your request could not be sent.\n");
         exit(1);


    }else{
        printf("Your activation request has successfully been sent to the teacher.....\n");


    }

    viewCommands();
}

