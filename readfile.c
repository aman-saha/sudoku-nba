#include <stdio.h>
#include <stdlib.h>
#include <string.h>
 
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
	exit(EXIT_SUCCESS);
}