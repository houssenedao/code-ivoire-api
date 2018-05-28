# Contributing
Guide de contribution pour les  projets en cours
```
code-ivoire-api
code-ivoire-mobile
```

### Projets
Pour commencer à travailler  sur un projet vous devez dans un premier temps fork le projet, une fois fait  ajoutez le remote du projet  principal avec comme nom `upstream` au sein de votre projet cloner avec git

    $ git remote  add upstream https://github.com/codedivoire/code-ivoire-api.git

ou

    $ git remote  add upstream https://github.com/codedivoire/code-ivoire-mobile.git

Après chaque merge d'un `PR - Pull Request` vous devez exécuter un pull sur l'upstream sur la  branch `develop`

    $ git pull upstream develop

### Branch
Les PRs doivent se  faire uniquement sur la branch `develop` . Vous devez faire attention à ne pas créer une branch autre que master et develop sur l'upstream, toutefois  il est possible que vous voyez des branchs autre que master et develop  sur l'upstream ces branchs serviront pour le versionning de *l'API*

### Issues
Il y aura des issues prédéfini  avec un ou plusieurs `labels` et un `milestone` avec un délais à respecter,  vous devez vous attribuer des `issues` bien avant toutes modifications, toutefois  si vous travaillez sur une modification particulière non disponnible dans les tâches des  issues, vous pouvez en créer. Chaque PR doit comporter l'identifiant de  l'issue concerner.

### PRs
Tous les PRs feront l'objet  d'une approbation avant d'étre merge. Si vous avez terminer votre intervention sur un issue particulier et vous vouslez la fermer automatiquement apres le merge utiliser les mots cles ci-dessous
`close, closes, closed, fix, fixes, fixed, resolve, resolves, resolved`
e.g: `close #7` ou `closes #1, closes #7`  ces mots cles doivent etre dans la description de votre PR.
