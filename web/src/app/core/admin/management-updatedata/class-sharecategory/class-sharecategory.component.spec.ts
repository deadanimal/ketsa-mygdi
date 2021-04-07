import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ClassSharecategoryComponent } from './class-sharecategory.component';

describe('ClassSharecategoryComponent', () => {
  let component: ClassSharecategoryComponent;
  let fixture: ComponentFixture<ClassSharecategoryComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ClassSharecategoryComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ClassSharecategoryComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
