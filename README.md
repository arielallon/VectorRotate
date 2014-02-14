VectorRotate
============

Programming Pearls - Problem 2.3

Implement various algorithms for rotating a vector (array) X spots [to the left].


Algorithms
==========

Juggler
-------
Loops through the vector, picking up the first element and shifting elements X spots down the line over and over. Repeats itself (upping the starting element each time) until all elements have been shifted.

Swapper
-------
Recursively swaps equally sized left and right chunks of the vector, starting with a left chunk the size of the shift amount.

Reverser
--------
Split the vector into two parts (left the size of the shift amount, right the rest). Reverse each one, then reverse the entire vector.
Why this works isn't entirely obvious until you think about it for a bit or look at the explination.

(@todo, add big-O analysis of time and space of each to this readme)
