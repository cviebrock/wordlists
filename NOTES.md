# How to implement routing


## Generating new lists


## 1. Word list

	http://example.com/list?list=twl06

Default is TWL06


## 2. Output format

	http://example.com/list
	http://example.com/list.txt
	http://example.com/list.pdf

Default is TXT


## 3. Conditions

### 3.1 Word length

Fixed length:

	?length=4

Mininum length (i.e. 8 or longer):

	?min_length=8

Maximum length (i.e. up to and including 5:

	?max_length=5

Range (i.e. 2 or 3 letters):

	?length=2-3

Default is no length restriction.


### 3.2 Contains letters

Contains at least one E:

	?contains=E

Contains at least two Es:

	?contains=EE

Contains at least one E and one R (not necessarily in order -- see [Pattern Matching])

	?contains=ER

Doesn't contain any Es:

	?doesnt_contain=E

Contains Q but not U:

	?contains=Q&doesnt_contain=U


### 3.3 Pattern matching

Periods denote any letter:

	?matches=AEINST.

Asterisks denote any number of sequential letters:

	?matches=QU?
	?matches=?ING
	?matches=?SS?

Can be defined more than once:

	?matches=RE?&matches=?ING

Negation

	?matches=Q?&doesnt_match=QU?

