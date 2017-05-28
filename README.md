# authorvotes

This is a simple plugin that depends on the upvote plugin by Lindsey DiLoreto.

[https://craftpl.us/plugins/upvote](https://craftpl.us/plugins/upvote)


The purpose of this plugin is to keep track of the sum of all the blog votes an author has received. This can be done by simply looping through all the entries by a certain author and adding up the votes. However, this presents a N+1 problem and requires many unnecessary queries to the database.

The authorvotes plugin keeps a record of all the votes an author receives in a separate table in the database, allowing for more efficient retrieval of this data.

## usage
This plugin works in sync with the upvote plugin, simply install this plugin after installing upvote, and it would start tracking the total vote.

*note: the authorvote and upvote plugins should be installed at the same time. If there are already votes on entries in the upvote table, the values of authorvotes will not be accurate.*

To output the total votes of an author, use the *getVotes * twig tag.


```
{{ craft.authorvotes.getVotes(authorId) }}
```
