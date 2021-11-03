## Radency App in Laravel

Maak een simpele lijstweergave, create, edit en delete flow voor een fictief model. Hiervoor hoef je geen aandacht te besteden aan de frontend styling. 1 form veld is genoeg. Na het deleten van deze en hypothetisch andere models zou je de site admin een mail willen sturen hierover. Zet deze actie tm de Mail class zover mogelijk klaar. De mail zou in de achtergrond moeten draaien en dan dus nog gegevens nodig kunnen hebben van het eerder verwijderde item. Maak tot slot voor de vorm een 2e fictief model als one to many child van de 1e model. Deze mogen uiteindelijk mee verwijderd worden als ze zouden bestaan. Unit tests inrichten naar eigen inzicht.

- Model Todo & Model User
- Mail

### setup

php artisan make:migration create_todo_table --create=todo
php artisan make:controller TodoController --resource --model=Todo

