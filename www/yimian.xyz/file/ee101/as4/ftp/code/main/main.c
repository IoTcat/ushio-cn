/*
Name: Assesment 4 of EEE 101

File Name: main.c

Copyright: Free

Author: Group 9

Description: Program for a hotal management system.
 */



#include <stdio.h>  /* Include standard library of stdio.h */
#include <stdlib.h> /* Include standard liberary of stdlib.h */
#include <conio.h>  /* Include liberary of conio.h  */
#include <string.h>	/* Include string.h */ 
#include <ctype.h>  /* Include ctype.h  */
#include <windows.h> /* lib for include windows API such as msgbox */
#include <time.h>	/* lib for getting system time */
#include <errno.h> /* lib dealing with errors */
#include <math.h> /* lib for math */


/* program title */
#define PROGRAM_TITLE "TITLE EEE101 Assessment 4 BY Group 9"
/* window color */
#define WINDOW_COLOR "color 0F"
/* window size */
#define WINDOW_SIZE "mode con cols=88 lines=30"
/* the max length of a name */
#define NAME_MAX_LENGTH 35
/* the max length of a tel */
#define TEL_MAX_LENGTH 20
/* the max length of a national ID */
#define NATIONALID_MAX_LENGTH 20
/* the max length of a nation, province/state or a city */
#define ADDRESS_MAX_LENGTH 35
/* the max visitors number in one room */
#define VISITOR_MAX_NUMBER 3
/* the name of data folder */
#define DATA_FOLDER "data"
/* the name of visitor data file */
#define VISITOR_DATA_FILE "Visitor.txt"
/* the name of room data file */
#define ROOM_DATA_FILE "Room.txt"
/* the name of visitor del file */
#define VISITOR_DEL_FILE "Del.txt"
/* the name of room del file */
#define ROOM_DEL_FILE "Dell.txt"
/* the name of signature file */
#define SIGNATURE_FILE "Signature.txt"
/* the password of data file */
#define PASSWORD 'l'
/* the digital signature key */
#define DIGITAL_SIGNATURE_KEY 'k'






/*****************declear global variables ********************/

/* variable of user name ::manager, receptionist*/
char *g_pUsr=NULL;
/* this variable indicate the rows of return struct */ 
int g_nRtrnRows=0;





/************** declear struct here ****************************/

typedef struct visitor
{
	int id;/* unique key for identify visitor */
	char name[NAME_MAX_LENGTH];
	char tel[TEL_MAX_LENGTH];
	unsigned int vip:2;/* 1->not vip, 2->vip */
	char nationalId[NATIONALID_MAX_LENGTH];
	char nation[ADDRESS_MAX_LENGTH];
	char province[ADDRESS_MAX_LENGTH];
	char city[ADDRESS_MAX_LENGTH];

} visitor;



typedef struct room
{
	int index;
	int roomId;
	int date;
	int visitorId[VISITOR_MAX_NUMBER+1];
	/* type: 1->not availzble, 2->**level,3->***level,4->****level,5->VIP */
	int type;
	double price;
	/* checkIn: 1->not visit, 2->visited */
	unsigned int checkIn:2;
	/* checkOut: 1->not out, 2->checkout */
	unsigned int checkOut:2;

} room;

/************** above are the struct declearation ****************************/



/**************** here are Fundamental Functions ,please don not change these ***********************/

int input__detect_input_ASCII();
int input__get_arrow();
void print__setup();
void print__space(int nSpace);
void print__header();
void print__item(char chItem[20],int nMrk,int nSpc);
int data__generate_visitor_ID();
int data__get_current_date();
void data__check_file_path(char hint);
char *data__generate_digital_signature(char *tmp_signature);
void data__update_file_signature();
void data__check_file_signature();
int data__insert_visitor_info(struct visitor *pVstr);
int data__insert_room_info(struct room *pRm);
int *data__seek_key_word(char chKey[40], FILE *fp,int * nSeek);
void data__get_one_visitor_info(int nSeek,FILE *fp,visitor *visitor,int index);
void data__get_one_room_info(int nSeek,FILE *fp,room *pRoom,int index);
int *data__get_del_usr_info(int *deled_usr);
double *data__get_del_room_info(double *deled_usr);
struct visitor *data__get_visitor_info(char value[35],visitor *pVstr);
struct room *data__get_room_info(int index, int roomId, int date, int visitorId[], int type, double price, int checkIn, int checkOut,room *pRm);
int data__del_visitor_info(int id);
int data__del_room_info(int id,int room);

/**************** the above are Fundamental Functions ,please don not change these ***********************/


/*************here are the declearation of some demo functions***********************/

int demo__test_fundamental_functions();
int demo__menu();
void demo__print__menu(int nPnt);
void demo__data__insert_visitor_info();
void demo__data__del_visitor_info();
void demo__data__get_visitor_info();
void demo__data__insert_room_info();
void demo__data__del_room_info();
void demo__data__get_room_info();
void demo__create_visitor();
void demo__create_room();
void demo__display_all_visitors();
void demo__display_all_rooms();

/***************above are the declearation of some demo functions*********************/





/*****************please put your function declearation here!!***********************/

//void demo__hello_world(int o_O);






/*****************Above are your function declearation ^_^ ***********************/



/* main function begin */
int main(int argc, char const *argv[])
{
	demo__test_fundamental_functions(); /* Don't Remove This For Test Purpose!! */

	/*************Your Code Here****************/

	//printf("Hellow World!\n");






	/*************Your Code Above****************/

	system("echo This is the END of your Main function!!!!&&pause>nul"); /* Remain you of the end of your main function */

	return 0;
}













/*********** demo test function, you can find the demo of most fundamental function here ********/

/* demo guide function*/
int demo__test_fundamental_functions()
{
	printf("Please Press 't' to goto test screen, or press any other key to goto your main fuction!\n");

	if(input__detect_input_ASCII()=='t')
	{
		system("cls");/*clean the screen */
		printf("1. press 'p' to goto input and print fundamental function demo.\n\n");
		printf("2. press 'd' to goto data fundamental function demo.\n\n");
		printf("3. press 'g' to create visitor and room data to support your own code!\n\n");

		/* get user pressed key */
		char tmp_getPress=input__detect_input_ASCII();

		if(tmp_getPress=='p')
		{
			system("cls");/* clean the screen */

			/* initialize the window */
			print__setup();

			/* quit untill press an esc*/
			while(demo__menu()!=6);

			/* quit the demo function */
			return 0;
		}

		if(tmp_getPress=='d')
		{
			system("cls");/* clean the screen */

			printf("Please select:\n\n");
			printf("1. data__insert_visitor_info() demo\n\n");
			printf("2. data__del_visitor_info() demo\n\n");
			printf("3. data__get_visitor_info() demo\n\n\n");
			printf("4. data__insert_room_info() demo\n\n");
			printf("5. data__del_room_info() demo\n\n");
			printf("6. data__get_room_info() demo\n\n");

			tmp_getPress=input__detect_input_ASCII();

			system("cls");/* clean the screen */

			if(tmp_getPress=='1') demo__data__insert_visitor_info();
			if(tmp_getPress=='2') demo__data__del_visitor_info();
			if(tmp_getPress=='3') demo__data__get_visitor_info();
			if(tmp_getPress=='4') demo__data__insert_room_info();
			if(tmp_getPress=='5') demo__data__del_room_info();
			if(tmp_getPress=='6') demo__data__get_room_info();

			system("echo Press any key to goto main()&pause>nul");

		}

		if(tmp_getPress=='g')
		{
			system("cls");

			printf("Please select:\n\n");
			printf("1. Create a visitor data\n\n");
			printf("2. Create a room data\n\n");
			printf("3. Display all visitors\n\n");
			printf("4. Display all rooms\n\n");

			tmp_getPress=input__detect_input_ASCII();

			system("cls");

			if(tmp_getPress=='1')	demo__create_visitor();
			if(tmp_getPress=='2')	demo__create_room();
			if(tmp_getPress=='3')	demo__display_all_visitors();
			if(tmp_getPress=='4')	demo__display_all_rooms();

			system("echo Press any key to goto main()&pause>nul");
		}

		/* clean the screen */
		system("cls");
	}

	return 0;
}



/* demo function for display menu, you can design your menu logic here*/
int demo__menu()
{
	int nVal=54;
	int nArrw=0;
	do
	{
		/* print out the menu */
		demo__print__menu(nVal%6+1);

		/* detect user keyboard press*/
		nArrw= input__get_arrow();

		/* when input a arrow */
		if(nArrw==1||nArrw==-1)
			nVal+=nArrw;

		/* when press enter */
		if(nArrw==6)
			break;
		/* when press esc */
		if(nArrw==9)
			return 6;

	}while(1);

	/* return user choice by number*/
	return nVal%6+1;
}


/* demo function for printing a menu ,you can design your menu here*/
void demo__print__menu(int nPnt)
{

	/* clear screen */
	system("cls");

	/* print the screen header */
	print__header();

	printf("Please use Arrows on Keyboard to Choose:\n");
	char chItem1[]="Choose 1";
	/* function pringt__item has three parameters: display string, if it is choosed,extra space on its left*/ 
	print__item(chItem1,(nPnt==1)?1:0,0);

	char chItem2[]="Choose 2";
	print__item(chItem2,(nPnt==2)?1:0,0);

	char chItem3[]="Choose 3";
	print__item(chItem3,(nPnt==3)?1:0,0);

	char chItem4[]="Choose 4";
	print__item(chItem4,(nPnt==4)?1:0,0);

	char chItem5[]="Choose 5";
	print__item(chItem5,(nPnt==5)?1:0,0);

	char chItem6[]="Exit   ";
	print__item(chItem6,(nPnt==6)?1:0,0);

	printf("\n\n\n\n\n\n\n\n\n\n\n\n\n");
	printf("Press ESC to Exit!");

}


/* demo for data_insert visitor_info() */
void demo__data__insert_visitor_info()
{

	printf("Demo 1:\nThis demo will create a visitor file of yimian. \nto begin with this function, you need a visitor struct which include the visitor info you want to insert. \nYou can see this code in demo__data_insert_visitor_info() function\n\n");

	/* Create a new visitor struct variable with some user info */
	visitor demo_NewVisitor={0/*this is the visitor id, please leave 0 here */,"yimian Liu"/*name*/,"18118155257"/*tel*/,1/*vip*/,"370902199909041813"/*nationalId*/,"china"/*nation*/,"shandong"/*province*/,"taian"/*city*/};

	/* excute the data__insert_visitor_info function and when the function crash, print the error info on screen */
	if(data__insert_visitor_info(&demo_NewVisitor)) printf("Error in Function data__insert_visitor_info: %s\n",strerror(errno));
	else printf("Create successfully!\n");

}



/* demo for data__del_visitor_info */
void demo__data__del_visitor_info()
{
	printf("Demo 2:\nTo delete a visitor info, you need to provide the visitor's ID.\n\n");
	printf("you can see detailed info in demo__data__del_visitor_info()\n\n");
		
	printf("Please input the ID:\n");

	/* get ID input */
	char tmp_visitorId[11];
	while(!scanf("%s",tmp_visitorId)) fflush(stdin);

	/* del the visitor info */
	if(data__del_visitor_info(atoi(tmp_visitorId))) printf("Error in Function data__del_visitor_info: %s\n",strerror(errno));; 

}


/* demo for data__get_visitor_info() */
void demo__data__get_visitor_info()
{
	printf("Demo 3:\nGet Visitors info, index key word is 'china' in this case. \n");
	printf("to search a visitor info, data__get_visitor_info() need a key word and a visitor pointer.\n");
	printf("the key word must be more than three word and the visito info found will be store in the visitor point you provided\n");
	printf("for more info please see demo__data__get_visitor_info() function!\n\n");

	/* provide a key word to search visitors*/
	char tmp_Nation[35]="china";

	/* declear a visitor pointer to receive the matched visitors info */
	struct visitor *pVstr=NULL;
	pVstr= data__get_visitor_info(tmp_Nation,pVstr);

	/* show error hint if the function not runing successfully */
	if(errno)	printf("Error in Function data__get_visitor_info: %s\n",strerror(errno));

	/* deal with situation that nothing found */
	if(!g_nRtrnRows) printf("No visitor found!!\n");

	/* print all these visitors info on screen */
	for(int i=0;i<g_nRtrnRows;i++)
	printf("ID:%d Name:%s Tel:%s VIP:%d NationalID:%s Nation:%s province:%s City:%s\n", (pVstr+i)->id, (pVstr+i)->name, (pVstr+i)->tel,(pVstr+i)->vip, (pVstr+i)->nationalId,(pVstr+i)->nation, (pVstr+i)->province, (pVstr+i)->city);

}


/* demo function for data__insert_room_info() */
void demo__data__insert_room_info()
{
	printf("Demo 4:\nThis demo will create a room file of room 666 in 20181111.\n");
	printf("data__insert_room_info() need the address of a room struct before insert one info.\n");
	printf("for more info please see demo__data__insert_room_info()\n\n");

	/* Create a new visitor struct variable with some user info */
	room demo_NewRoom={0/*this is the visitor id, please leave 0 here */,666/*roomId*/,20181111/*date*/,{2/*visitor number*/,1234567899,1243567899}/*visitorId*/,2/*room type*/,66.66/*price*/,2/*checkIn*/,1/*checkOut*/};

	/* excute the data__insert_visitor_info function and when the function crash, print the error info on screen */
	if(data__insert_room_info(&demo_NewRoom)) printf("Error in Function data__insert_room_info: %s\n",strerror(errno));
	else printf("Create successfully!\n");

}



/* demo for data__del_room_info() */
void demo__data__del_room_info()
{
	printf("Demo 5:\nTo delete a room info, you need to provide the index and the roomId.\n\n");
	printf("See more in function demo__data__del_room_info()\n\n" );

		printf("Please input the Index:\n");

		/* get index input */
		char tmp_roomIndex[11];
		while(!scanf("%s",tmp_roomIndex)) fflush(stdin);

		printf("Please input the RoomId:\n");

		/* get room input */
		char tmp_roomId[11];
		while(!scanf("%s",tmp_roomId)) fflush(stdin);

		/* del the visitor info */
		if(data__del_room_info(atoi(tmp_roomIndex),atoi(tmp_roomId))) printf("Error in Function data__del_room_info: %s\n",strerror(errno));
}



void demo__data__get_room_info()
{
	printf("Demo 6:\nGet room info, you need to set one or more condition, and the function will return all the room info which satisfy your condition.\n");
	printf("to learn more please see demo__data__get_room_info()\n\n");
	printf("in this case, we had set some condition for rooms searching.\n");
	printf("You can find more detail in function demo__data__get_room_info()\n\n");

	/* declear a room pointer to receive the matched rooms info */
	struct room *pRm=NULL;

	int hh[]={2/* number of visitors*/,1234567899/* visitorId*/,1243567899/* visitorId*/};
	pRm= data__get_room_info(0/*index*/,666/*roomId*/,0/*date*/,hh/*visitorId*/,2/*type*/,0/*price*/,0/*checkIn*/,1/*checkOut*/,pRm);

	/* show error hint if the function not runing successfully */
	if(!pRm)	printf("Error in Function data__get_room_info: %s\n",strerror(errno));

	/* deal with situation that nothing found */
	if(!g_nRtrnRows) printf("No room found!!\n");

	/* print all these rooms info on screen */
	for(int i=0;i<g_nRtrnRows;i++)
	printf("Index:%d Room:%d date:%d VisitorNum:%d Type:%d Price:%f CheckIn:%d CheckOut:%d\n", (pRm+i)->index, (pRm+i)->roomId, (pRm+i)->date,(pRm+i)->visitorId[0], (pRm+i)->type,(pRm+i)->price, (pRm+i)->checkIn, (pRm+i)->checkOut);

}


/* function for create a visitor*/
void demo__create_visitor()
{
	visitor demo_NewVisitor;

	printf("Please input a name:\n");
	while(!scanf("%s",demo_NewVisitor.name)) fflush(stdin);

	printf("Please input a tel:\n");
	while(!scanf("%s",demo_NewVisitor.tel)) fflush(stdin);

	printf("Please input if it is vip (not vip->1,vip->2) :\n");
	char tmp_ch[15];
	while(!scanf("%s",tmp_ch)) fflush(stdin);
	demo_NewVisitor.vip=atoi(tmp_ch);

	printf("Please input a nationalId:\n");
	while(!scanf("%s",demo_NewVisitor.nationalId)) fflush(stdin);

	printf("Please input a nation:\n");
	while(!scanf("%s",demo_NewVisitor.nation)) fflush(stdin);

	printf("Please input a province:\n");
	while(!scanf("%s",demo_NewVisitor.province)) fflush(stdin);

	printf("Please input a city:\n");
	while(!scanf("%s",demo_NewVisitor.city)) fflush(stdin);

	demo_NewVisitor.id=0;

	/* excute the data__insert_visitor_info function and when the function crash, print the error info on screen */
	if(data__insert_visitor_info(&demo_NewVisitor)) printf("Error in Function data__insert_visitor_info: %s\n",strerror(errno));
	else printf("Create successfully!\n");
}


void demo__create_room()
{

	room demo_NewRoom={0/*this is the visitor id, please leave 0 here */,666/*roomId*/,20181111/*date*/,{2/*visitor number*/,1234567899,1243567899}/*visitorId*/,2/*room type*/,66.66/*price*/,2/*checkIn*/,1/*checkOut*/};

	char tmp_ch[25];

	printf("Please input a roomId (e.g. 205):\n");
	while(!scanf("%s",tmp_ch)) fflush(stdin);
	demo_NewRoom.roomId=atoi(tmp_ch);

	printf("Please input a date (e.g. 20181111):\n");
	while(!scanf("%s",tmp_ch)) fflush(stdin);
	demo_NewRoom.roomId=atoi(tmp_ch);

	printf("Please input the number of visitors:\n");
	int tmp_vNum=0;
	while(!scanf("%s",tmp_ch)) fflush(stdin);
	tmp_vNum=atoi(tmp_ch);

	if(tmp_vNum)
	{
		for(int i=0;i<tmp_vNum;i++)
		{
			printf("Please input visitors Id\n");
			while(!scanf("%s",tmp_ch)) fflush(stdin);
			demo_NewRoom.visitorId[i+1]=atoi(tmp_ch);
		}
	}

	demo_NewRoom.visitorId[0]=tmp_vNum;

	printf("Please input a room type (e.g. 1,2,3,4,5):\n");
	while(!scanf("%s",tmp_ch)) fflush(stdin);
	demo_NewRoom.type=atoi(tmp_ch);

	printf("Please input a price (e.g. 205.5):\n");
	while(!scanf("%s",tmp_ch)) fflush(stdin);
	demo_NewRoom.price=atof(tmp_ch);

	printf("Please input if it is checkIn (not In->1, In->2):\n");
	while(!scanf("%s",tmp_ch)) fflush(stdin);
	demo_NewRoom.checkIn=atoi(tmp_ch);

	printf("Please input if it is checkOut (not Out->1, Out->2):\n");
	while(!scanf("%s",tmp_ch)) fflush(stdin);
	demo_NewRoom.checkOut=atoi(tmp_ch);


	/* excute the data__insert_visitor_info function and when the function crash, print the error info on screen */
	if(data__insert_room_info(&demo_NewRoom)) printf("Error in Function data__insert_room_info: %s\n",strerror(errno));
	else printf("Create successfully!\n");
}



void demo__display_all_visitors()
{
	char tmp_chTmp[35];
	tmp_chTmp[0]='\0';
	/* declear a visitor pointer to receive the matched visitors info */
	struct visitor *pVstr=NULL;
	pVstr= data__get_visitor_info(tmp_chTmp,pVstr);

	/* show error hint if the function not runing successfully */
	if(!pVstr)	printf("Error in Function data__get_visitor_info: %s\n",strerror(errno));

	/* print all these visitors info on screen */
	for(int i=0;i<g_nRtrnRows;i++)
	printf("ID:%d Name:%s Tel:%s VIP:%d NationalID:%s Nation:%s province:%s City:%s\n", (pVstr+i)->id, (pVstr+i)->name, (pVstr+i)->tel,(pVstr+i)->vip, (pVstr+i)->nationalId,(pVstr+i)->nation, (pVstr+i)->province, (pVstr+i)->city);
}



void demo__display_all_rooms()
{
	/* declear a room pointer to receive the matched rooms info */
	struct room *pRm=NULL;

	pRm= data__get_room_info(0/*index*/,0/*roomId*/,0/*date*/,NULL/*visitorId*/,0/*type*/,0/*price*/,0/*checkIn*/,0/*checkOut*/,pRm);

	/* show error hint if the function not runing successfully */
	if(!pRm)	printf("Error in Function data__get_room_info: %s\n",strerror(errno));

	/* print all these rooms info on screen */
	for(int i=0;i<g_nRtrnRows;i++)
	printf("Index:%d Room:%d date:%d VisitorNum:%d Type:%d Price:%f CheckIn:%d CheckOut:%d\n", (pRm+i)->index, (pRm+i)->roomId, (pRm+i)->date,(pRm+i)->visitorId[0], (pRm+i)->type,(pRm+i)->price, (pRm+i)->checkIn, (pRm+i)->checkOut);

}

/***************above are the demo function********************/











/**********!!!!!!!!Fundamental Functions Here::Please do not change these unless you are forced to do!!!!!!!!!***********/


/* function for detect the keyborad to wait for a keyboard event and return it with ASCII */
int input__detect_input_ASCII()
{
	int nKey;

	/* clear former cache */
	fflush(stdin);

	/* get key value */
    nKey = _getch();

    return nKey;
}



/* function for get keyboard arrow event */
int input__get_arrow()
{
	int nVal=0;

	while(1)
	{
		nVal=input__detect_input_ASCII();

		if(nVal==224)
		{
			/* get arraw value */
			int nKey=input__detect_input_ASCII();

			if(nKey==75)
				return -1;
			if(nKey==77)
				return 1;
			if(nKey==72)
				return -1;
			if(nKey==80)
				return 1;
			else
				return 0;
		}

		if(nVal==13)
			return 6;
		if(nVal==27)
			return 9;
	}
}



/* function for adjust window color, size and position */
void print__setup()
{
	/* set window title */
	system(PROGRAM_TITLE);	
	/* set window size */
	system(WINDOW_SIZE);
	/* set window color */
	system(WINDOW_COLOR);
}


/* function for print many space */
void print__space(int nSpace)
{
	int i;
	for(i=0;i<nSpace;i++)
		printf(" ");
}


/* display a header */
void print__header()
{
	time_t timep;

    struct tm *curtm;
    time (&timep);
    curtm=gmtime(&timep);
	printf("%d-%d-%d %d:%d:%02d",curtm->tm_year+1900, curtm->tm_mon+1,curtm->tm_mday, curtm->tm_hour,curtm->tm_min, curtm->tm_sec);

	print__space(19);

	if(g_pUsr)
		printf("User: %6s",g_pUsr );

	printf("this is the header");

	printf("\n----------------------------------------------------------------------------------------");
}



/* function for print a standard item */
void print__item(char chItem[20],int nMrk,int nSpc)
{
	printf("\n\n");

	print__space(nSpc+(88-strlen(chItem))/2);

	printf("%11s",chItem );

	if(nMrk==1)
	{
		print__space(3);
		printf("<<--");
	}
}



/* function for get current date */
int data__get_current_date()
{
	time_t timep;

    struct tm *p;
    time (&timep);
    p=gmtime(&timep);

    int date=(1900+p->tm_year)*10000+(1+p->tm_mon)*100+(p->tm_mday)*1;

    return date;
}



/* function for generate a new visitor ID */
int data__generate_index_ID()
{
	/*get current timestamp*/
	time_t t;
	t = time(NULL);

 	/*utlize timestamp as visitor ID*/
	int visitor_ID = time(&t);

	return visitor_ID;
}



/*function for check if a path exist, if not exist then create one */
void data__check_file_path(char hint)
{

	char chCmd[65];

    /* create command :: file name */
   	if(hint=='v'||hint=='r'||hint=='d'||hint=='i'||hint=='V'||hint=='I'||hint=='D'||hint=='R'||hint=='g')
    sprintf(chCmd,"IF NOT EXIST \"%s\" MD \"%s\"",DATA_FOLDER,DATA_FOLDER);

	/* if data floder not exist, then make one */
	system(chCmd);

    /* if data file not exist, then make one */
	if(hint=='v'||hint=='d')
    	sprintf(chCmd,"@echo off&IF NOT EXIST \"%s\\%s\" echo VisitorData:>%s\\%s",DATA_FOLDER,VISITOR_DATA_FILE,DATA_FOLDER,VISITOR_DATA_FILE);


	if(hint=='V'||hint=='D')
		sprintf(chCmd,"@echo off&IF NOT EXIST \"%s\\%s\" echo RoomData:>%s\\%s",DATA_FOLDER,ROOM_DATA_FILE,DATA_FOLDER,ROOM_DATA_FILE);

	system(chCmd);	

}



/*function for encode data */
char *data__encode(char *str)
{
	for(int i=0;i<strlen(str);i++)
	{
		str[i]^=PASSWORD;
	}

	return str;
}



/*function of generating digital signature for data file*/
char *data__generate_digital_signature(char *tmp_signature)
{
	char signature[20];
	int fLen=0;
	char chPath[150];

   	data__check_file_path('g');

	/* declear a file var */
    FILE *fp;

    /* get file name */
    sprintf(chPath,"%s/%s",DATA_FOLDER,VISITOR_DATA_FILE);
    /* point the data file by at */
    fp = fopen (chPath, "r");

	fseek(fp,0,SEEK_END);
	fLen=ftell(fp);

	fseek(fp,0,SEEK_SET);
	signature[0]=DIGITAL_SIGNATURE_KEY;

	for(int i=0;i<fLen;i++) {signature[0]^=fgetc(fp);signature[0]+=ftell(fp);}

	fclose(fp);

    /* get file name */
    sprintf(chPath,"%s/%s",DATA_FOLDER,ROOM_DATA_FILE);
    /* point the data file by at */
    fp = fopen (chPath, "r");

	fseek(fp,0,SEEK_END);
	fLen=ftell(fp);

	fseek(fp,0,SEEK_SET);
	signature[1]=DIGITAL_SIGNATURE_KEY;

	for(int i=0;i<fLen;i++) {signature[1]^=fgetc(fp);signature[1]+=ftell(fp);}

	fclose(fp);

    /* get file name */
    sprintf(chPath,"%s/%s",DATA_FOLDER,VISITOR_DEL_FILE);
    /* point the data file by at */
    fp = fopen (chPath, "r");

	fseek(fp,0,SEEK_END);
	fLen=ftell(fp);

	fseek(fp,0,SEEK_SET);
	signature[2]=DIGITAL_SIGNATURE_KEY;

	for(int i=0;i<fLen;i++) {signature[2]^=fgetc(fp);signature[2]+=ftell(fp);}

	fclose(fp);

    /* get file name */
    sprintf(chPath,"%s/%s",DATA_FOLDER,ROOM_DEL_FILE);
    /* point the data file by at */
    fp = fopen (chPath, "r");

	fseek(fp,0,SEEK_END);
	fLen=ftell(fp);

	fseek(fp,0,SEEK_SET);
	signature[3]=DIGITAL_SIGNATURE_KEY;

	for(int i=0;i<fLen;i++) {signature[3]^=fgetc(fp);signature[3]+=ftell(fp);}

	fclose(fp);

	signature[12]='\0';

	for(int i=0;i<4;i++)
	{
		if(signature[i]<0)	signature[i]=-signature[i];
		signature[i+8]=signature[i]%7+65;
		signature[i+4]=signature[i]%10+48;
		signature[i]=signature[i]%26+97;
	}

	//free(tmp_signature);
	tmp_signature=(char *)malloc(13*sizeof(char));

	tmp_signature[0]=signature[0];
	tmp_signature[1]=signature[7];
	tmp_signature[2]=signature[10];
	tmp_signature[3]=signature[6];
	tmp_signature[4]=signature[3];
	tmp_signature[5]=signature[9];
	tmp_signature[6]=signature[2];
	tmp_signature[7]=signature[4];
	tmp_signature[8]=signature[8];
	tmp_signature[9]=signature[5];
	tmp_signature[10]=signature[11];
	tmp_signature[11]=signature[6];
	tmp_signature[12]='\0';

	fclose(fp);

	return tmp_signature;
}



/*function for update file signature */
void data__update_file_signature()
{ 
	FILE *fp;
	char chPath[50];
	char *signature=NULL;
    /* get file name */
    sprintf(chPath,"%s/%s",DATA_FOLDER,SIGNATURE_FILE);
    /* point the data file by at */
    fp = fopen (chPath, "w+");

	fprintf(fp, "%s",data__generate_digital_signature(signature) );

	fclose(fp);
}




/* function for check file signature */
void data__check_file_signature()
{
	char *current_signature=NULL;
	current_signature=data__generate_digital_signature(current_signature);

	FILE *fp;
	char chPath[50];
	/* declear the empty situation*/
	char empty[]="d7C7dCd7C7C7";
    /* get file name */
    sprintf(chPath,"%s/%s",DATA_FOLDER,SIGNATURE_FILE);
    /* point the data file read only */
    fp = fopen (chPath, "r");

    fseek(fp,0,SEEK_SET);

    for(int i=0;i<12;i++)
    {
    	if(fgetc(fp)!=current_signature[i]&&strcmp(current_signature,empty)!=0)
    	{
    		MessageBox( 0, "Cannot recognize Data file!", "Warnning!", 0 );
    		exit(-1);
    	}
    }

    fclose(fp);
}



/* function for insert a visitor data */
int data__insert_visitor_info(struct visitor *pVstr)
{
	/* reset errno */
	errno=0;

	data__check_file_signature();

	char chPath[150];

   	data__check_file_path('v');

	/* declear a file var */
    FILE *fp;

    /* get file name */
    sprintf(chPath,"%s/%s",DATA_FOLDER,VISITOR_DATA_FILE);
    /* point the data file by at */
    fp = fopen (chPath, "at+");

    /* insert new visitor */
    sprintf( chPath,"$$$%d$|%s$|%s$|%d$|%s$|%s$|%s$|%s$|as4|||",pVstr->id=data__generate_index_ID(),pVstr->name,pVstr->tel,pVstr->vip,pVstr->nationalId,pVstr->nation,pVstr->province,pVstr->city);

    /* encode the string */
    char *chCode=data__encode(chPath);

    fprintf(fp, "%s", chCode);
    /* close file */
    fclose(fp);

    data__update_file_signature();

    /* exclude invalid argument error */
    if(errno==22) errno=0;

    /* return error num */
	return errno;
}



/* function for insert a room data */
int data__insert_room_info(struct room *pRm)
{
	/* reset errno */
	errno=0;

	data__check_file_signature();

	char chPath[150];

   	data__check_file_path('V');

	/* declear a file var */
    FILE *fp;

    /* get file name */
    sprintf(chPath,"%s/%s",DATA_FOLDER,ROOM_DATA_FILE);
    /* point the data file by at */
    fp = fopen (chPath, "at+");

    /* transform visitorId to string */
    char tmp_visitorId[12*(VISITOR_MAX_NUMBER+1)];
    tmp_visitorId[0]='\0';
    char tmp_str[12];

    for(int i=1;i<=pRm->visitorId[0];i++)
    {
    	sprintf(tmp_str,"%d",pRm->visitorId[i]);
    	strcat(tmp_visitorId,tmp_str);
    }
    /* if no visitorId, put 0 in string*/
    if(pRm->visitorId[0]==0)	sprintf(tmp_visitorId,"%d",0);

    /* insert new visitor */
    sprintf( chPath,"$$$%dI$|%dR$|%dD$|%sV$|%dT$|%fP$|%dC$|%dc$|hhhH$|as4|||",pRm->index=data__generate_index_ID(),pRm->roomId,pRm->date,tmp_visitorId,pRm->type,pRm->price,pRm->checkIn,pRm->checkOut);

    /* encode the string */
    char *chCode=data__encode(chPath);

    fprintf(fp, "%s", chCode);
    /* close file */
    fclose(fp);

    data__update_file_signature();

    /* exclude invalid argument error */
    if(errno==22) errno=0;

    /* return error num */
	return errno;
}



/* function for locate a peice of info in a file by key words */
int *data__seek_key_word(char chKey[40], FILE *fp,int * nSeek)
{
	int i,j=0;


	/* if the length of key words is less than 3, the function will not work */
	if(strlen(chKey)<2)	return NULL;

	/* get the length of the file */
	fseek(fp,0,SEEK_END); 
	int nFlen=ftell(fp);

	/* free nSeek firstly in case it has been decleared */
	free(nSeek);

	/* allocate a memary for nSeek */
	nSeek=(int *)malloc((nFlen/strlen(chKey))*sizeof(int));

	/* move the pointer to the beginning of the File */
	fseek( fp, 0, SEEK_SET );

	/* find all location where the key word exist */
	for(i=0;ftell(fp)<nFlen;)
	{
		/* match the key word */
		for(j=0;j<strlen(chKey);)
		{
			if(fgetc(fp)==(chKey[j++]^PASSWORD)) ;
			else break;
		}

		/* if found the key word, record its location */
		if(j==strlen(chKey))
		{
			nSeek[++i]=ftell(fp);
			/*active this only for debug purpose*//*printf("%d\n",nSeek[i] );*/
		}
	}

	/* record the times that the key words appeared in the File */
	nSeek[0]=i;

	return nSeek;
}



/* function for get one visitor info */
void data__get_one_visitor_info(int nSeek,FILE *fp,visitor *visitor,int index)
{

	int i,nItem,nLineCnt,nLineCnt_sub=0;
	char chTmp[35];


	/* get the length of the File */
	fseek(fp,0,SEEK_END); 
	int nFlen=ftell(fp);

	/* set the pointer at the nSeek point of the File */
	fseek(fp,nSeek,SEEK_SET); 

	/* find the beginning of this visitor info */
	do
	{
		fseek(fp,-4,SEEK_CUR); 

	}while(!((fgetc(fp)^PASSWORD)=='$'&&(fgetc(fp)^PASSWORD)=='$'&&(fgetc(fp)^PASSWORD)=='$'));

	/* adjust the pionter for the following reading*/
	fseek(fp,2,SEEK_CUR); 
	/* read visitor info */
	nItem=0;
	do
	{
		/* only active this for debug purpose */
		/*printf("%c", (fgetc(fp)^PASSWORD));*/
		chTmp[0]='\0';
		i=0;
		/* read visitor info item one by one */
		do
		{
			fseek(fp,-2,SEEK_CUR); /* readjust the pointer*/

			chTmp[i++]=(fgetc(fp)^PASSWORD);

			/* mark when find a '$|' which indicate the end of one item */ 
			nLineCnt_sub=0;
			if((fgetc(fp)^PASSWORD)=='$')	nLineCnt_sub++;
			if((fgetc(fp)^PASSWORD)=='|')	nLineCnt_sub++;

			fseek(fp,-2,SEEK_CUR); /* readjust the pointer */

			/* mark when find a '|||' which indicate the end this user info */ 
			nLineCnt=0;
			if((fgetc(fp)^PASSWORD)=='|')	nLineCnt++;
			if((fgetc(fp)^PASSWORD)=='|')	nLineCnt++;
			if((fgetc(fp)^PASSWORD)=='|')	nLineCnt++;
			fseek(fp,-1,SEEK_CUR); 

		}while(nLineCnt_sub<2&&ftell(fp)<nFlen&&nLineCnt<3);

		/* give chTmp a end mark */
		chTmp[i]='\0';

		if(nLineCnt_sub==2)
		{
			/* load these visitor info to struct pointer */
			if(nItem==0)	(visitor+index)->id=atoi(chTmp);
			if(nItem==1)	strcpy((visitor+index)->name,chTmp);
			if(nItem==2)	strcpy((visitor+index)->tel,chTmp);
			if(nItem==3)	(visitor+index)->vip=atoi(chTmp);
			if(nItem==4)	strcpy((visitor+index)->nationalId,chTmp);
			if(nItem==5)	strcpy((visitor+index)->nation,chTmp);
			if(nItem==6)	strcpy((visitor+index)->province,chTmp);
			if(nItem==7)	strcpy((visitor+index)->city,chTmp);

			/* only active this for debug purpose */
			/*printf("%s\n",chTmp);*/
		}
		/* when come accross '|||' break */
		if(nLineCnt==3||ftell(fp)>nFlen) break;

		fseek(fp,2,SEEK_CUR); 
		nItem++;

	}while(1);

}



/* function for get one room info */
void data__get_one_room_info(int nSeek,FILE *fp,room *pRoom,int index)
{

	int i,nItem,nLineCnt,nLineCnt_sub=0;
	char chTmp[35];

	/* get the length of the File */
	fseek(fp,0,SEEK_END); 
	int nFlen=ftell(fp);

	/* set the pointer at the nSeek point of the File */
	fseek(fp,nSeek,SEEK_SET); 

	/* find the beginning of this visitor info */
	do
	{
		fseek(fp,-4,SEEK_CUR); 

	}while(!((fgetc(fp)^PASSWORD)=='$'&&(fgetc(fp)^PASSWORD)=='$'&&(fgetc(fp)^PASSWORD)=='$'));

	/* adjust the pionter for the following reading*/
	fseek(fp,2,SEEK_CUR); 
	/* read visitor info */
	nItem=0;
	do
	{
		/* only active this for debug purpose */
		/*printf("%c", (fgetc(fp)^PASSWORD));*/
		chTmp[0]='\0';
		i=0;
		/* read visitor info item one by one */
		do
		{
			fseek(fp,-2,SEEK_CUR); /* readjust the pointer*/

			chTmp[i++]=(fgetc(fp)^PASSWORD);

			/* mark when find a '$|' which indicate the end of one item */ 
			nLineCnt_sub=0;
			if((fgetc(fp)^PASSWORD)=='$')	nLineCnt_sub++;
			if((fgetc(fp)^PASSWORD)=='|')	nLineCnt_sub++;

			fseek(fp,-2,SEEK_CUR); /* readjust the pointer */

			/* mark when find a '|||' which indicate the end this user info */ 
			nLineCnt=0;
			if((fgetc(fp)^PASSWORD)=='|')	nLineCnt++;
			if((fgetc(fp)^PASSWORD)=='|')	nLineCnt++;
			if((fgetc(fp)^PASSWORD)=='|')	nLineCnt++;
			fseek(fp,-1,SEEK_CUR); 

		}while(nLineCnt_sub<2&&ftell(fp)<nFlen&&nLineCnt<3);

		/* give chTmp a end mark */
		chTmp[i-1]='\0';

		if(nLineCnt_sub==2)
		{
			/* load these visitor info to struct pointer */
			if(nItem==0)	(pRoom+index)->index=atoi(chTmp);
			if(nItem==1)	(pRoom+index)->roomId=atoi(chTmp);
			if(nItem==2)	(pRoom+index)->date=atoi(chTmp);

			if(nItem==3)
			{
				char tmp_chTmp[13];
				int j=0;
				int k=0;

				for(k=0;k<(strlen(chTmp)/10);k++)
				{
					for(j=0;j<10;j++)
					{
						tmp_chTmp[j]=chTmp[j+k*10];
					}
					tmp_chTmp[j]='\0';

					(pRoom+index)->visitorId[k+1]=atoi(tmp_chTmp);
				}

				(pRoom+index)->visitorId[0]=k;
			}	

			if(nItem==4)	(pRoom+index)->type=atoi(chTmp);
			if(nItem==5)	(pRoom+index)->price=atof(chTmp);
			if(nItem==6)	(pRoom+index)->checkIn=atoi(chTmp);
			if(nItem==7)	(pRoom+index)->checkOut=atoi(chTmp);

			/* only active this for debug purpose */
			/*printf("%s\n",chTmp);*/
		}
		/* when come accross '|||' break */
		if(nLineCnt==3||ftell(fp)>nFlen) break;

		fseek(fp,2,SEEK_CUR); 
		nItem++;

	}while(1);

}



/* function for collect info about deleted visitor id */
int *data__get_del_usr_info(int *deled_usr)
{
	/* reset errno */
	errno=0;

	char chPath[60];

	data__check_file_path('r');
  
  	/* this function should not have worked well with out this code, however...*/
	/*if(deled_usr!=NULL) free(deled_usr);*/
	/* declear a file var */
    FILE *fp;

    /* get file name */
    sprintf(chPath,"%s/%s",DATA_FOLDER,VISITOR_DEL_FILE);
    /* point the data file by at */
    fp = fopen (chPath, "r");

    /* get the length of the file */
    fseek(fp,0,SEEK_END); 
	int nFlen=ftell(fp);

	/* allocate a memory for int[] deled_usr*/
	deled_usr=(int *)malloc((nFlen/10+1)*sizeof(int));

	/* move pointer to the beginning of the File */
    fseek(fp,0,SEEK_SET);

    char strTmp[12];
    int j=0;
    int i=0;

    /* give the number of deleted visitors to int[] */
    *deled_usr=nFlen/10+1;

    /* find each deleted visitor ID */
    for(j++;j<nFlen/10+1;j++)
    {
    	/* get one ID */
    	for(i=0;i<10;i++)
   	 	{
    		strTmp[i]=(fgetc(fp)^PASSWORD);
    	}
    	strTmp[i]='\0';

    	/* assign the ID to int[]*/
    	*(deled_usr+j)=atoi(strTmp);
    }
    /*close the File */
    fclose(fp);

    /* return the int[]*/
    return deled_usr;
}



/* function for collect info about deleted visitor id */
double *data__get_del_room_info(double *deled_rom)
{
	/* reset errno */
	errno=0;

	char chPath[60];

	data__check_file_path('R');
  
  	/* this function should not have worked well with out this code, however...*/
	/*if(deled_rom!=NULL) free(deled_usr);*/
	/* declear a file var */
    FILE *fp;

    /* get file name */
    sprintf(chPath,"%s/%s",DATA_FOLDER,ROOM_DEL_FILE);
    /* point the data file by at */
    fp = fopen (chPath, "r");

    /* get the length of the file */
    fseek(fp,0,SEEK_END); 
	int nFlen=ftell(fp);

	/* allocate a memory for int[] deled_usr*/
	deled_rom=(double *)malloc((nFlen/13+1)*sizeof(double));

	/* move pointer to the beginning of the File */
    fseek(fp,0,SEEK_SET);

    char strTmp[12];
    int j=0;
    int i=0;

    /* give the number of deleted visitors to int[] */
    *deled_rom=nFlen/14+1;

    /* find each deleted visitor ID */
    for(j++;j<nFlen/14+1;j++)
    {
    	/* get one ID */
    	for(i=0;i<14;i++)
    		strTmp[i]=(fgetc(fp)^PASSWORD);
    	
    	strTmp[i]='\0';

    	/* assign the ID to int[]*/
    	*(deled_rom+j)=(double)atof(strTmp);
    }
    /*close the File */
    fclose(fp);

    /* return the int[]*/
    return deled_rom;
}



/* function for get visitors info */
struct visitor *data__get_visitor_info(char value[35],visitor *pVstr)
{
	/* reset errno */
	errno=0;

	data__check_file_signature();

	char chPath[60];

	data__check_file_path('d');

	/* declear a file var */
    FILE *fp;

    /* get file name */
    sprintf(chPath,"%s/%s",DATA_FOLDER,VISITOR_DATA_FILE);
    /* point the data file by at */
    fp = fopen (chPath, "r");

	int *a=NULL;

	if(value[0]=='\0') sprintf(value,"1543");

	/* find visitor info position in File by key words */
	a=data__seek_key_word(value, fp,a);

	/* if no visitor found */
	if(!a||!a[0]){errno=0;g_nRtrnRows=0;data__update_file_signature(); return NULL;}

	/* free the memmory of former pVstr */
	free(pVstr);

	/* set a visitor struct array */
	struct visitor visitors[a[0]+4];

	/* point pVstr at visitors */
	pVstr=visitors;

	/* allocate memory for pVstr */
	pVstr=(visitor*)malloc(a[0]*sizeof(visitor));

	/* find all visitor ID which is abandon */
	int *del=NULL;
	del=data__get_del_usr_info(del);

	int ifDel=0;
	int ii=0;

	/* convert exist visitor info to struct one by one*/
	for(int i=0;i<a[0];i++,ii++)
	{
		ifDel=0;

		data__get_one_visitor_info(a[i+1],fp,pVstr,ii);

		/* exclude deleted visitor ID */
		for(int j=0;j<*del;j++)
		{
			if((pVstr+ii)->id==*(del+j+1)) ifDel=1;
		}

		if(ifDel==1)	ii--;
	}

	/* close file */
    fclose(fp);

    data__update_file_signature();

	/* inform return rows of the pVstr*/
	g_nRtrnRows=ii;

	if(errno==22)	errno=0;

   	return pVstr;
}



/* function for get room info */
struct room *data__get_room_info(int index, int roomId, int date, int visitorId[], int type, double price, int checkIn, int checkOut,room *pRm)
{
	/* reset errno */
	errno=0;

	data__check_file_signature();

	char chPath[60];
	char value[35];

	while(1)
	{
		if(index!=0)
		{
			sprintf(value,"%dI$",index);
			break;
		}

		if(roomId!=0)
		{
			sprintf(value,"%dR$",roomId);
			break;
		}

		if(date!=0)
		{
			sprintf(value,"%dD$",date);
			break;
		}

		if(visitorId!=NULL)
		{
			char tmp_ch[13];
			value[0]='\0';

			for(int i=0;i<visitorId[0];i++)
			{
				itoa(visitorId[i+1],tmp_ch,10);
				strcat(value,tmp_ch);
			}
			sprintf(tmp_ch,"V$");
			strcat(value,tmp_ch);
			break;
		}

		if(type!=0)
		{
			sprintf(value,"%dT$",type);
			break;
		}

		if(price!=0)
		{
			sprintf(value,"%lfP$",price);
			break;
		}

		if(checkIn!=0)
		{
			sprintf(value,"%dC$",checkIn);
			break;
		}

		if(checkOut!=0)
		{
			sprintf(value,"%dc$",checkOut);
			break;
		}

		sprintf(value,"hhhH$");
		break;
		
	}


	data__check_file_path('D');

	/* declear a file var */
    FILE *fp;

    /* get file name */
    sprintf(chPath,"%s/%s",DATA_FOLDER,ROOM_DATA_FILE);
    /* point the data file by at */
    fp = fopen (chPath, "r");

	int *a=NULL;

	/* find room info position in File by key words */
	a=data__seek_key_word(value, fp,a);

	/* if no room found */
	if(!a){errno=0;	g_nRtrnRows=0;data__update_file_signature(); return NULL;}

	/* free the memmory of former pVstr */
	free(pRm);

	/* set a visitor struct array */
	struct room rooms[a[0]+4];

	/* point pVstr at visitors */
	pRm=rooms;

	/* allocate memory for pVstr */
	pRm=(room*)malloc(a[0]*sizeof(room));

	/* find all visitor ID which is abandon */
	double *del=NULL;
	del=data__get_del_room_info(del);

	int ifDel=0;
	int ii=0;

	/* convert exist visitor info to struct one by one*/
	for(int i=0;i<a[0];i++,ii++)
	{
		ifDel=0;

		data__get_one_room_info(a[i+1],fp,pRm,ii);

		/* exclude deleted visitor ID */
		for(int j=0;j<*del;j++)
		{
			/* only active this for debug purpose*//*printf("%d\n", (int)((*(del+j+1)-(double)(int)*(del+j+1))*1000));*/

			if(((pRm+ii)->index==(int)*(del+j+1))&&((pRm+ii)->roomId==((int)((*(del+j+1)-(double)(int)*(del+j+1))*1000)+1))) ifDel=1;
		}

		if(index!=0&&(pRm+ii)->index!=index) ifDel=1;
		if(roomId!=0&&(pRm+ii)->roomId!=roomId) ifDel=1;
		if(date!=0&&(pRm+ii)->date!=date) ifDel=1;

		if(visitorId!=NULL)
		{
			ifDel=visitorId[0];
			for(int k=0;k<visitorId[0];k++)
			{
				for(int l=0;l<(pRm+ii)->visitorId[0];l++)
				{
					if(visitorId[k+1]==(pRm+ii)->visitorId[l+1]) ifDel--;
				}
			}
		}

		if(type!=0&&(pRm+ii)->type!=type) ifDel=1;
		if(price!=0&&(pRm+ii)->price!=price) ifDel=1;
		if(checkIn!=0&&(pRm+ii)->checkIn!=checkIn) ifDel=1;
		if(checkOut!=0&&(pRm+ii)->checkOut!=checkOut) ifDel=1;

		if(ifDel!=0)	ii--;
	}

	/* close file */
    fclose(fp);

    data__update_file_signature();

	/* inform return rows of the pVstr*/
	g_nRtrnRows=ii;

	if(errno==22)	errno=0;

   	return pRm;
}


/* function for delete a visitor info */
int data__del_visitor_info(int id)
{
	/* reset errno */
	errno=0;

	data__check_file_signature();

	/*check if the ID legal */
	if(id>1543399229&&id<10000000000)
	{
		char chPath[30];

		data__check_file_path('i');

		/* declear a file var */
    	FILE *fp;

   	 	/* get file name */
   	 	sprintf(chPath,"%s/%s",DATA_FOLDER,VISITOR_DEL_FILE);
    	/* point the data file by at */
    	fp = fopen (chPath, "at+");

    	/* allocate tmp str with memory */
    	char *tmp_str=NULL;
    	tmp_str=(char*)malloc(13*sizeof(char));


    	/* insert new visitor to del list */
    	sprintf( tmp_str,"%d",id);

    	/* encode data */
    	tmp_str=data__encode(tmp_str);

    	/* output data to file */
    	fprintf(fp, "%s",tmp_str );

    	/* close file */
    	fclose(fp);

    	data__update_file_signature();

    	return 0;
	}


	/* remark error */
	errno=2;
	if(errno==22)	errno=0;
	return 2;
}



/* function for delete a room info */
int data__del_room_info(int id,int room)
{
	/* reset errno */
	errno=0;

	data__check_file_signature();

	/*check if the ID legal */
	if(id>1543399229&&id<10000000000)
	{
		char chPath[30];

		data__check_file_path('I');

		/* declear a file var */
    	FILE *fp;

   	 	/* get file name */
   	 	sprintf(chPath,"%s/%s",DATA_FOLDER,ROOM_DEL_FILE);
    	/* point the data file by at */
    	fp = fopen (chPath, "at+");

    	/* allocate tmp str with memory */
    	char *tmp_str=NULL;
    	tmp_str=(char*)malloc(20*sizeof(char));


    	/* insert new room to del list */
    	sprintf( tmp_str,"%d.%d",id,room);

    	/* encode data */
    	tmp_str=data__encode(tmp_str);

    	/* output data to file */
    	fprintf(fp, "%s",tmp_str );

    	/* close file */
    	fclose(fp);

    	data__update_file_signature();

    	return 0;
	}
	/* remark error */
	errno=2;
	if(errno==22)	errno=0;
	return 2;
}

/***********!!!!!!!!!!above are fundamental functions!!!!!!!!!************/