# Publishing an implementation guide


## Goal
We want to start with an implementationGuide - a 2020Jun release which is the current one, besides the CI which is in the HL7 build. 


## Folder Structure
I have my IGs in a folder - but you can have them anywhere:
```
c:\ImplementationGuides
c:\ImplementationGuides\<IGName> 
    (the source of the IG, with all the folders). I also keep the jar in the parent folder because the template can pick it up:
c:\ImplementationGuides\Publication\org.hl7.fhir.publisher.jar
```


For setting up the publication, I use a folder called `Publication` which I put under my ImplementationGuides folder (but could be outside that tree as well).
My Publication folder structure looks like:

```
    c:\ImplementationGuides\Publication
    c:\ImplementationGuides\Publication\ig-registry
      (here I clone  the ig registry)
    c:\ImplementationGuides\Publication\fhir-ig-history-template
      (here I clone the standard history template)
    c:\ImplementationGuides\Publication\<IGName>
    c:\ImplementationGuides\Publication\<IGName>\source
      (for the source as I do some changes without changing the CI. Not sure if this is needed)
    c:\ImplementationGuides\Publication\<IGName>\website\
      (this is the folder that is going to be copied to the web server)
    c:\ImplementationGuides\Publication\<IGName>\website\<Release>
      (for example 2020Jun)
      
```



1. Make sure your ImplementationGuide is building correctly
  1. Also that the canonicals in your implementationGuide match your destination folder.
1. Make sure that our IG's source\package-list.json only contains the ci-build entry 
 in this json, "version", "path", "status" and "current" are mandatory elements.

This is how your folder should look like on this step
https://github.com/costateixeira/ig-publication/tree/ca17a3d29cddd569687764e250e47692a567d78f

https://github.com/costateixeira/ig-publication/blob/ca17a3d29cddd569687764e250e47692a567d78f/source/package-list.json

more information on the package-list.json file: (link...)

1. Build again to ensure everything is ok
1. Add a release entry: - add a new entry to package-list.json. 
"date", "fhirversion" (lowercase!), "sequence", "version", "path", "status" and "current" are mandatory
https://github.com/costateixeira/ig-publication/commit/d8934d902cd0b53c9a1c07eb9b9647262d0befb7

1. Create an empty folder that will contain content to publish on the web, copy the package-list there and create a publish.ini
this folder should (ot be inside your IG's folder structure. For example if your ImplementationGuide is in
```
c:\ImplementationGuides\<IGName>
```
You can have your empty folder for publication in 
```
c:\ImplementationGuides\Publication\<IGName>
```
Also create a folder for your release: 
```
c:\ImplementationGuides\Publication\<IGName>\<Release>
```
This is how your folder should look like on this step
> https://github.com/costateixeira/ig-publication/tree/323f4b70fabb18a6a3a1f26d9fd9bdc7072373eb
These are the changes
> https://github.com/costateixeira/ig-publication/commit/323f4b70fabb18a6a3a1f26d9fd9bdc7072373eb

1. Copy history template from (...) into your website folder. Do not replace your package-list.json with the one that is in history-template.
These are the changes
> https://github.com/costateixeira/ig-publication/commit/fbc6342124e095460ae999916358768859f91495
1. Go back to your IG folder and build the release with the publish option and the URL where the release will be published
```
.\\_genOnce.bat -publish http://hl7belgium.org/fhir/core/2020Jun
```
Then copy that output folder to your release folder (Publication\<IGName>\<Release>)
1. Get the ig-registry and copy it in a place where it is accessible (e.g. on your Publication folder)
> Here are the changes: https://github.com/costateixeira/ig-publication/commit/4d13c346a5aedde62b72593ea78b2883d4168cab
And this is how your folder should look like on this step
> https://github.com/costateixeira/ig-publication/tree/4d13c346a5aedde62b72593ea78b2883d4168cab
1. Run with -publish http://hl7belgium.org/fhir/core -web -milestone and copy the output of that to your website folder. Yes to overwrite the files.
1. On the website folder, or another folder, run
```
java -jar .\org.hl7.fhir.publisher.jar -publish-update -folder website -registry ..\ig-registry\fhir-ig-list.json
```

