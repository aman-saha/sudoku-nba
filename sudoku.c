#include <stdio.h>
#include <stdlib.h>
#include <pthread.h>
/*
* Structure that holds the parameters passed to a thread.
* This specifies where the thread should start verifying.
*/
typedef struct
{
	// The starting row.
	int row, r;
	// The starting column.
	int col;
	// The pointer to the board.
	int (* board)[9];
} parameters;
// Prototype for the walk_rows function.
void * walk_rows(void * params);
// Prototype for the walk_cols function.
void * walk_cols(void * params);
// Prototype for 3x3 square function.
void * check_square(void * params);

int main(void)
{
	FILE *stream;
	char *line = NULL;
	char arr[20][20];
	int board[9][9];
	size_t len = 0;
	ssize_t read;
 	int i=0,j=0;
	stream = fopen("solution.txt", "r");
	if (stream == NULL)
		exit(EXIT_FAILURE);
 
	while ((read = getline(&line, &len, stream)) != -1) 
	{
		//printf("Retrieved line of length %zu :\n", read);
		strcpy(arr[i],line);
		//printf("%s", arr[i]);
		i++;
	}
	int r,c;r=0;c=0;
 	for(i=1;i<10;i++)
 	{
 		for(j=0;j<strlen(arr[i]);j++)
 		{
 			if(arr[i][j]!=' ')
 			{
 				board[r][c] = (int)arr[i][j] - 48;
 				c++;
 			}
 		}
 		c=0;
 		r++;
 	}
 	printf("%s\n", arr[0]);
 	for(i=0;i<9;i++)
 	{
 		for(j=0;j<9;j++)
 		{
 			printf("%d ",board[i][j]);
 		}
 		printf("\n");
 	}
	free(line);
	fclose(stream);
//Board Creation 
/*int board[9][9] = {
{6, 2, 4, 5, 3, 9, 1, 8, 7},
{5, 1, 9, 7, 2, 8, 6, 3, 4},
{8, 3, 7, 6, 1, 4, 2, 9, 5},
{1, 4, 3, 8, 6, 5, 7, 2, 9},
{9, 5, 8, 2, 4, 7, 3, 6, 1},
{7, 6, 2, 3, 9, 1, 4, 5, 8},
{3, 7, 1, 9, 5, 6, 8, 4, 2},
{4, 9, 6, 1, 8, 2, 5, 7, 3},
{2, 8, 5, 4, 7, 3, 9, 1, 6}};*/
//Creating the parameters for the columns and rows check
parameters * param0 = (parameters *) malloc(sizeof(parameters));
param0->row = 0;
param0->col = 0;
param0->board = board;
//Creating the parameters for the 3x3 threads
// First 3x3
parameters * param1 = (parameters *) malloc(sizeof(parameters));
param1->row = 0;
param1->col = 0;
param1->board = board;
// Second 3x3
parameters * param2 = (parameters *) malloc(sizeof(parameters));
param2->row = 0;
param2->col = 3;
param2->board = board;
// Third 3x3
parameters * param3 = (parameters *) malloc(sizeof(parameters));
param3->row = 0;
param3->col = 6;
param3->board = board;
// Fourth 3x3
parameters * param4 = (parameters *) malloc(sizeof(parameters));
param4->row = 3;
param4->col = 0;
param4->board = board;
// Fifth 3x3
parameters * param5 = (parameters *) malloc(sizeof(parameters));
param5->row = 3;
param5->col = 3;
param5->board = board;
// Sixth 3x3
parameters * param6 = (parameters *) malloc(sizeof(parameters));
param6->row = 3;
param6->col = 6;
param6->board = board;
// Seventh 3x3
parameters * param7 = (parameters *) malloc(sizeof(parameters));
param7->row = 6;
param7->col = 0;
param7->board = board;
// Eighth 3x3
parameters * param8 = (parameters *) malloc(sizeof(parameters));
param8->row = 6;
param8->col = 3;
param8->board = board;
// Ninth 3x3
parameters * param9 = (parameters *) malloc(sizeof(parameters));
param9->row = 6;
param9->col = 6;
param9->board = board;
//Creating threads
pthread_t thread_rows, thread_cols, thread1, thread2, thread3, thread4, thread5, thread6, thread7, thread8, thread9;
//Creating the return values for the threads
void * all_rows;
void * all_cols;
void * square1;
void * square2;
void * square3;
void * square4;
void * square5;
void * square6;
void * square7;
void * square8;
void * square9;
// Initialising the threads
pthread_create(&thread_rows, NULL, walk_rows, (void *) param0);
pthread_create(&thread_cols, NULL, walk_cols, (void *) param0);
pthread_create(&thread1, NULL, check_square, (void *) param1);
pthread_create(&thread2, NULL, check_square, (void *) param2);
pthread_create(&thread3, NULL, check_square, (void *) param3);
pthread_create(&thread4, NULL, check_square, (void *) param4);
pthread_create(&thread5, NULL, check_square, (void *) param5);
pthread_create(&thread6, NULL, check_square, (void *) param6);
pthread_create(&thread7, NULL, check_square, (void *) param7);
pthread_create(&thread8, NULL, check_square, (void *) param8);
pthread_create(&thread9, NULL, check_square, (void *) param9);
//Waiting for all threads to finish their tasks
pthread_join(thread_rows, &all_rows);
pthread_join(thread_cols, &all_cols);
pthread_join(thread1, &square1);
pthread_join(thread2, &square2);
pthread_join(thread3, &square3);
pthread_join(thread4, &square4);
pthread_join(thread5, &square5);
pthread_join(thread6, &square6);
pthread_join(thread7, &square7);
pthread_join(thread8, &square8);
pthread_join(thread9, &square9);
//Checking whether the Sudoku Puzzle was solved 
if ((int) all_rows == 1 &&
(int) all_cols == 1 && 
(int) square1 == 1 && 
(int) square2 == 1 && 
(int) square3 == 1 && 
(int) square4 == 1 && 
(int) square5 == 1 && 
(int) square6 == 1 && 
(int) square7 == 1 && 
(int) square8 == 1 && 
(int) square9 == 1 )
{
	printf("The Sudoku Puzzle is solved!\n");
}
else {
printf("The Sudoku Puzzle is NOT solved.\n");
}
return 0;
}
/*
Checks each row if it contains all digits 1-9.
@param void * The parameters (pointer).
@return void * 1 if all rows contain all digits from 1-9, 0 otherwise.
*/
void * walk_rows(void * params)
{
int i,j;
parameters * data = (parameters *) params;
int startRow = data->row;
int startCol = data->col;
for ( i = startRow; i < 9;i++)
{
int row[10] = {0};
for ( j = startCol; j < 9; ++j)
{
int val = data->board[i][j];
if (row[val] != 0)
	{
return (void *) 0;
}
else{
row[val] = 1;
}
}
}
return (void *) 1;
}
/*
Checks each column if it contains all digits 1-9.
@param void * The parameters (pointer).
@return void * 1 if all rows contain all digits from 1-9, 0 otherwise.
*/
void * walk_cols(void * params)
{
	int i, j;
	parameters * data = (parameters *) params;
	int startRow = data->row;
	int startCol = data->col;
	for ( i = startCol; i < 9; ++i)
	{
	int col[10] = {0};
	for (j = startRow; j < 9; ++j)
		{
	int val = data->board[j][i];
	if (col[val] != 0)
	{
	return (void *) 0;
	}
	else{
	col[val] = 1;
	}
	}
	}
	return (void *) 1;
}
/*
Checks each row if it contains all digits 1-9.
@param void * The parameters (pointer).
@return void * 1 if all rows contain all digits from 1-9, 0 otherwise.
*/
void * check_square(void * params) 
{
	int i, j;
	parameters * data = (parameters *) params;
	int startRow = data->row;
	int startCol = data->col;
	int saved[10] = {0};
	for ( i = startRow; i < startRow + 3; ++i)
	{
		for ( j = startCol; j < startCol + 3; ++j)
		{
			int val = data->board[i][j];
			if (saved[val] != 0)
			{
				return (void *) 0;
			}
			else
			{
				saved[val] = 1;
			}
		}
	}
	return (void *) 1;
}