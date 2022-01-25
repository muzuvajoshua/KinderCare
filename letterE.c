#include<stdio.h>
char letter[7][4];
char attempted_letter;
int number;
  void F(){
    for(int i =0; i<7; i++){
            printf("* ");
        if(i == 0 || i ==3){
        for(int k = 0; k<3; k++){

                printf("* ");
        }
        }
        printf("\n");
    }
}
void E(){
 for(int i =0; i<7; i++){
            printf("* ");
        if(i == 0 || i ==3 || i==6){
        for(int k = 0; k<3; k++){

                printf("* ");
        }
        }
        printf("\n");
    }

    }
void M(){

    for(int i=0; i<7; i++){

        for(int x=0; x<4; x++){
                if (i==3&&x==1){
                    printf(" *");
                }
                if(x==0 || x==3 || (i==1 && x==1)|| (i==1 && x==2)){
                    printf(" * ");
                }
                else {
                  printf("   ");
                }
        }
        printf("\n");
    }

}

//FUNCTION FOR K
void K(){
    for(int i=0; i<7; i++){

        for(int x=0; x<4; x++){
            if(x==0 || (x==3&&(i==0||i==6)) ||(x==2&&(i==1||i==5))|| (x==1&&(i==2||i==4))){
                printf(" * ");
            }else{
            printf("   ");
            }
        }
        printf("\n");
    }
}
    void P(){
         for(int i=0; i<7; i++){

        for(int x=0; x<4; x++){
            if(x==0 || (x==1 &&(i==0 || i==3)) || (x==2 &&(i==0 || i==3)) || (x==3 &&(i==1 || i==2)) ){
                printf(" * ");
            }else{
            printf("   ");
            }
        }
        printf("\n");






    }


}



int main(){
   printf("please enter the letter you are attempting:");
        scanf(" %c", &attempted_letter);


  for(int r = 0; r<7; r++)
  {

      for(int p = 0; p<4; p++){
            printf("please enter a 1 for a * or 0 for space for index[%d][%d]:", r,p);
            scanf("%d", &number);
            if(number == 1){
                letter[r][p] = '*';
            }else if(number == 0){
            letter[r][p]=' ';
            }else{
            printf("you entered a wrong number");
            }
      }

  }
  for(int t =0; t<7; t++){
    for(int y = 0; y<4; y++){
        printf("%c",letter[t][y]);
        printf(" ");
    }
    printf("\n");
  }


return 0;

}

