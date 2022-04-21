module.exports = {"en.about":{"design":"Design","design_summary":"I design my code before building it","functionality":"Functionality","functionality_summary":"Scalable, readable and maintainable logic","less_information":"Less Information","more_information":"More Information","requirements":"Requirements","requirements_summary":"I make sure it is clear what you want me to build.","user_interface":"User Interface","user_interface_summary":"Visually appealing, dynamic and responsive UI","who_am_i_text":"I'm a full-stack web developer and freelancer specialized in writing e-commerce software in Laravel \/ PHP and Vue.js. Count on me to write extensible and maintainable web applications for your e-commerce business, thus increasing your revenue. Although my specialization, I have over 5+ years in writing software in other languages and fields. Either commercial, in my BSc. and MSc. study in Robotics at the TU Delft and as a hobby."},"en.auth":{"failed":"These credentials do not match our records.","password":"The provided password is incorrect.","throttle":"Too many login attempts. Please try again in :seconds seconds."},"en.contact":{"address":"Address","address_name":"Delft, Netherlands","email":"Email","first_name":"First Name","get_in_touch":"Get in Touch","get_in_touch_text":"If you want to hire me for your project, feel free to contact me with this contact form. You can also contact me directly via email, phone or social media.","last_name":"Last Name","message":"Message","name":"Name","phone":"Phone","send":"Send","thanks_for_contacting":"Thanks for contacting me! I will reply as soon as possible."},"en.header":{"about_me":"About Me","contact":"Contact","home":"Home","portfolio":"Portfolio"},"en.home":{"e_commerce":"E-commerce web applications.","hi":"Hi, I'm","i_am":"Laravel and Vue.js developer","view_my_work":"View my work"},"en.pagination":{"next":"Next &raquo;","previous":"&laquo; Previous"},"en.passwords":{"reset":"Your password has been reset!","sent":"We have emailed your password reset link!","throttled":"Please wait before retrying.","token":"This password reset token is invalid.","user":"We can't find a user with that email address."},"en.projects":{"learn_more":"Learn More"},"en.sections":{"contact":"CONTACT","how_i_work":"HOW I WORK","projects":"PROJECTS","who_am_i":"Who am I?"},"en.skills":{"design":{"paragraph":{"one":"Before writing any software, I use the developed domain story from the requirements part to make a rough design of the domain model:","three":"We discuss the content of the use case, and if it satisfies with your requirements. If we agree on the functionality, I will start building the rest of the application to make the use case fully work.","two":"Then I start writing the highest level of code possible: the use case. In the previous example of creating a picklist from an order, the use case name would be CreatePicklistFromOrder. This use case is written such that any non-technical person is able to read it (with a little help about the syntax). This use case should have the order reference as input, looks up the order items that are on stock and create a picklist for these:"}},"functionality":{"paragraph":{"one":"I am specialized in using Laravel as a backend framework, which I use to create all the necessary functionalities, My Laravel code has a well structured architecture, that separates the business logic from the infrastructure and presentation layer. This keeps the code clean, maintainable, readable and scalable. I will first start writing the domain layer of the application, containing the business logic discussed. I will make the acceptance tests pass using dummy interface implementations. After that I will start writing the infrastructure, for example an EloquentOrderRepository or a MailChimpMailerService.","two":"Of course I use version control with git, keep my commits clean and small, and am experienced in working with other developers on git. Furthermore I will set up the required relational database structure, and will deploy the code on a server if needed."}},"requirements":{"paragraph":{"one":"Through the use of domain stories I sketch out the business logic you want me to build, before writing any software. In the image below you see an example domain story that is part of a larger warehouse management system. We iterate over this domain story multiple times until we agree on the business logic being correct.","three":"Now it's time to start designing the code that should pass the acceptance test!","two":"After that I start creating work items in Azure DevOps, where each sentence in the domain story becomes a feature. Acceptance criteria are specified according to your requirements, after which I start writing acceptance tests in phpunit that automatically test these criteria:"}},"user_interface":{"paragraph":{"one":"Before writing any front end software I sketch a design in Figma according to your requirements. This way we can iterate on the design easily. After agreeing on the design, I start coding the user interface using HTML5, TailwindCSS and Vue.js. The user interface is always responsive (scales with different screen sizes) and I make them dynamic using Vue.js.","two":"I am also experienced in working with other designers that create the design for me, after which I build the UI."}}},"en.validation":{"accepted":"The :attribute must be accepted.","accepted_if":"The :attribute must be accepted when :other is :value.","active_url":"The :attribute is not a valid URL.","after":"The :attribute must be a date after :date.","after_or_equal":"The :attribute must be a date after or equal to :date.","alpha":"The :attribute must only contain letters.","alpha_dash":"The :attribute must only contain letters, numbers, dashes and underscores.","alpha_num":"The :attribute must only contain letters and numbers.","array":"The :attribute must be an array.","attributes":[],"before":"The :attribute must be a date before :date.","before_or_equal":"The :attribute must be a date before or equal to :date.","between":{"array":"The :attribute must have between :min and :max items.","file":"The :attribute must be between :min and :max kilobytes.","numeric":"The :attribute must be between :min and :max.","string":"The :attribute must be between :min and :max characters."},"boolean":"The :attribute field must be true or false.","confirmed":"The :attribute confirmation does not match.","current_password":"The password is incorrect.","custom":{"attribute-name":{"rule-name":"custom-message"}},"date":"The :attribute is not a valid date.","date_equals":"The :attribute must be a date equal to :date.","date_format":"The :attribute does not match the format :format.","declined":"The :attribute must be declined.","declined_if":"The :attribute must be declined when :other is :value.","different":"The :attribute and :other must be different.","digits":"The :attribute must be :digits digits.","digits_between":"The :attribute must be between :min and :max digits.","dimensions":"The :attribute has invalid image dimensions.","distinct":"The :attribute field has a duplicate value.","email":"The :attribute must be a valid email address.","ends_with":"The :attribute must end with one of the following: :values.","exists":"The selected :attribute is invalid.","file":"The :attribute must be a file.","filled":"The :attribute field must have a value.","gt":{"array":"The :attribute must have more than :value items.","file":"The :attribute must be greater than :value kilobytes.","numeric":"The :attribute must be greater than :value.","string":"The :attribute must be greater than :value characters."},"gte":{"array":"The :attribute must have :value items or more.","file":"The :attribute must be greater than or equal to :value kilobytes.","numeric":"The :attribute must be greater than or equal to :value.","string":"The :attribute must be greater than or equal to :value characters."},"image":"The :attribute must be an image.","in":"The selected :attribute is invalid.","in_array":"The :attribute field does not exist in :other.","integer":"The :attribute must be an integer.","ip":"The :attribute must be a valid IP address.","ipv4":"The :attribute must be a valid IPv4 address.","ipv6":"The :attribute must be a valid IPv6 address.","json":"The :attribute must be a valid JSON string.","lt":{"array":"The :attribute must have less than :value items.","file":"The :attribute must be less than :value kilobytes.","numeric":"The :attribute must be less than :value.","string":"The :attribute must be less than :value characters."},"lte":{"array":"The :attribute must not have more than :value items.","file":"The :attribute must be less than or equal to :value kilobytes.","numeric":"The :attribute must be less than or equal to :value.","string":"The :attribute must be less than or equal to :value characters."},"max":{"array":"The :attribute must not have more than :max items.","file":"The :attribute must not be greater than :max kilobytes.","numeric":"The :attribute must not be greater than :max.","string":"The :attribute must not be greater than :max characters."},"mimes":"The :attribute must be a file of type: :values.","mimetypes":"The :attribute must be a file of type: :values.","min":{"array":"The :attribute must have at least :min items.","file":"The :attribute must be at least :min kilobytes.","numeric":"The :attribute must be at least :min.","string":"The :attribute must be at least :min characters."},"multiple_of":"The :attribute must be a multiple of :value.","not_in":"The selected :attribute is invalid.","not_regex":"The :attribute format is invalid.","numeric":"The :attribute must be a number.","password":"The password is incorrect.","present":"The :attribute field must be present.","prohibited":"The :attribute field is prohibited.","prohibited_if":"The :attribute field is prohibited when :other is :value.","prohibited_unless":"The :attribute field is prohibited unless :other is in :values.","prohibits":"The :attribute field prohibits :other from being present.","regex":"The :attribute format is invalid.","required":"The :attribute field is required.","required_if":"The :attribute field is required when :other is :value.","required_unless":"The :attribute field is required unless :other is in :values.","required_with":"The :attribute field is required when :values is present.","required_with_all":"The :attribute field is required when :values are present.","required_without":"The :attribute field is required when :values is not present.","required_without_all":"The :attribute field is required when none of :values are present.","same":"The :attribute and :other must match.","size":{"array":"The :attribute must contain :size items.","file":"The :attribute must be :size kilobytes.","numeric":"The :attribute must be :size.","string":"The :attribute must be :size characters."},"starts_with":"The :attribute must start with one of the following: :values.","string":"The :attribute must be a string.","timezone":"The :attribute must be a valid timezone.","unique":"The :attribute has already been taken.","uploaded":"The :attribute failed to upload.","url":"The :attribute must be a valid URL.","uuid":"The :attribute must be a valid UUID."},"nl.about":{"design":"Ontwerp","design_summary":"Voordat ik ga programmeren maak ik een ontwerp van de code","functionality":"Functionaliteit","functionality_summary":"Schaalbare, leesbare en onderhoudbare logica","less_information":"Minder Informatie","more_information":"Meer Informatie","requirements":"Requirements","requirements_summary":"Ik zorg ervoor dat het duidelijk wordt wat er gemaakt moet worden","user_interface":"User Interface","user_interface_summary":"Mooie, dynamische en responsieve UI","who_am_i_text":"Ik ben een full stack web developer en freelancer, gespecialiseerd in e-commerce software met Laravel en Vue.js. Ik heb een passie voor het maken van schaalbare en onderhoudbare e-commerce applicaties, waarmee ik bedrijven help hun bedrijfsprocessen te automatiseren. Hoewel ik mij nu specialiseer, heb ik meer dan 5 jaar ervaring in het schrijven van software in verschillende talen en werkvelden. Zowel commercieel, als in mijn BSc. \/ MSc. opleiding in Robotica aan de TU Delft, en als hobby."},"nl.contact":{"address":"Adres","address_name":"Delft, Zuid-Holland","email":"Email","first_name":"Voornaam","get_in_touch":"Neem contact met mij op","get_in_touch_text":"Als je mij wilt inhuren voor je project kun je het contact formulier invullen of mij bereiken op mijn telefoonnummer, mail of via social media.","last_name":"Achternaam","message":"Bericht","name":"Naam","phone":"Telefoonnummer","send":"Verzenden","thanks_for_contacting":"Dankjewel voor je bericht, ik zal zo snel mogelijk reageren!"},"nl.header":{"about_me":"Over Mij","contact":"Contact","home":"Home","portfolio":"Portfolio"},"nl.home":{"e_commerce":"E-commerce web applicaties.","hi":"Ik ben","i_am":"Laravel en Vue.js developer","view_my_work":"Bekijk mijn werk"},"nl.projects":{"learn_more":"Meer Informatie"},"nl.sections":{"contact":"CONTACT","how_i_work":"HOE GA IK TE WERK","projects":"PROJECTEN","who_am_i":"Wie ben ik?"},"nl.skills":{"design":{"paragraph":{"one":"Ik gebruik de domain story om een ontwerp te maken van de code:","three":"Daarna gaan we samen discussieren over de use case, of deze voldoet aan de requirements. Als we het eens zijn over de functionaliteit van een use case ga ik verder met het programmeren van de lagere level logica, zodat de use case ook daadwerkelijk doet wat hij moet doen","two":"Daarna begin ik met het uitschrijven van de domain story in de code, iedere zin in de story wordt een use case in de code. In het voorbeeld onder 'Requirements' gebruikte ik het aanmaken van een picklijst voor een order, welke vertaald in de use case CreatePicklistFromOrder. Zo'n use case is geprogrammeerd zodat zelfs een niet technisch persoon (met een beetje hulp over de syntax) kan begrijpen wat er staat. Deze use case heeft als input de order referentie, kijkt welke order regels op voorraad zijn en maakt hier een picklijst van:"}},"functionality":{"paragraph":{"one":"Ik ben gespecialiseerd in het programmeren in Laravel, wat ik gebruik voor het schrijven van al mijn backend logica. Dit is zowel eerder ontworpen business logica als de logica van de infrastructuur. Ik structureer mijn code in een hexagonal \/ clean architectuur, wat betekent dat ik mijn business logica (uses cases en domein model) scheidt van de infrastructuur en presentatie laag. Hierdoor blijft mijn code clean, onderhoudbaar en schaalbaar. Om een voorbeeld te noemen, in de business logica zul je alleen zien dat er gemaild moet worden naar de klant met een MailerService. In de infrastructuur wordt de MailerService geimplementeerd met een MailchimpMailerService, maar de business logica heeft geen weet van de daadwerkelijke implementatie.","two":"Uiteraard gebruik ik version control met git, waar ik werk met branches per feature, gebruik ik cleane commits en ben ervaren met het werken met andere mensen via git. Verder zorg ik ervoor dat de juiste relationale database structuur wordt opgezet met MySql en deploy ik de code op een server indien nodig"}},"requirements":{"paragraph":{"one":"Door gebruik te maken van domain stories schets ik de business logica uit, zonder het schrijven van een regel code. In de onderstaande afbeelding kun je een voorbeeld zien van zo'n domain story, welke onderdeel is van een groter warehouse management systeem. Samen itereren we over de domain story, totdat duidelijk is wat er gemaakt moet gaan worden.","three":"Na het schrijven van de acceptatie test is het tijd om de code te gaan schrijven zodat deze test slaagt!","two":"Hierna start ik met het opzetten van het project in Azure DevOps. Iedere zin in de domain story wordt een aparte feature met bijbehorende acceptatie criteria, welke ik gebruik om automatisch acceptatie tests te schrijven: "}},"user_interface":{"paragraph":{"one":"Voordat ik begin met het schrijven van front end software maak ik een schets van het design in Figma aan de hand van de requirements, zodat we snel kunnen itereren hierop. Als het design klaar programmeer ik de UI met HTML5, TailwindCSS en Vue.js. De UI is altijd responsive (schaalt op verschillende scherm groottes) en ik maak hem dynamisch met Vue.js.","two":"Verder ben ik ervaren met het werken met designers, die het design voor mij maken, zodat ik kan focussen op het programmeren."}}}};