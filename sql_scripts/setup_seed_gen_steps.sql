insert into gen_steps
(primary_action, secondary_action, result, ara, primary_type, secondary_type, result_type)
values
('blend','with','slurry', false,'liquid','food','sauce');

insert into gen_steps
(primary_action, secondary_action, result, ara, primary_type, secondary_type, result_type)
values
('bake',null,'cooked items', false,'food',null,'solid');

insert into gen_steps
(primary_action, secondary_action, result, ara, primary_type, secondary_type, result_type)
values
('layer','on','base', true,'solid','base','solid');

insert into gen_steps
(primary_action, secondary_action, result, ara, primary_type, secondary_type, result_type)
values
('spread','on','base', false,'sauce','base','solid');
