<?php
/*
Write a program that prints the numbers from 1 to 100. 
But for number is divisible of three print “is divisible to 3” instead of the number
and for the number is divisible of five print “is divisible to 5”. 
For numbers which are divisible of both three and five print “is divisible to 3 and 5”.
Remember, you can use the modulus operator to check if a number is divisible by another number.
*/
for( $i = 1; $i <= 100; $i++ ){
    if(($i %3)==0&&($i%5)== 0){
        echo $i.' is divisible by 3 and 5<br>';
    }   
    else if($i%3== 0){
        echo $i.' is divisible by 3<br>';
    }
    else if($i%5==0){
        echo $i.' is divisible by 5<br>';
    }
    else{
        echo $i.'<br>';
    }        
    
}

/* output should like this below
1
2
3 is divisible to 3
4
5 is divisible to 5
6 is divisible to 3
7
8
9 is divisible to 3
10 is divisible to 5
11
12 is divisible to 3
13
14
15 is divisible to 3 and 5
16
17
18 is divisible to 3
19
20 is divisible to 5
21 is divisible to 3
22
23
24 is divisible to 3
25 is divisible to 5
26
27 is divisible to 3
28
29
30 is divisible to 3 and 5
31
32
33 is divisible to 3
34
35 is divisible to 5
36 is divisible to 3
37
38
39 is divisible to 3
40 is divisible to 5
41
42 is divisible to 3
43
44
45 is divisible to 3 and 5
46
47
48 is divisible to 3
49
50 is divisible to 5
51 is divisible to 3
52
53
54 is divisible to 3
55 is divisible to 5
56
57 is divisible to 3
58
59
60 is divisible to 3 and 5
61
62
63 is divisible to 3
64
65 is divisible to 5
66 is divisible to 3
67
68
69 is divisible to 3
70 is divisible to 5
71
72 is divisible to 3
73
74
75 is divisible to 3 and 5
76
77
78 is divisible to 3
79
80 is divisible to 5
81 is divisible to 3
82
83
84 is divisible to 3
85 is divisible to 5
86
87 is divisible to 3
88
89
90 is divisible to 3 and 5
91
92
93 is divisible to 3
94
95 is divisible to 5
96 is divisible to 3
97
98
99 is divisible to 3
100 is divisible to 5

*/


?>