import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ClassCategoryComponent } from './class-category.component';

describe('ClassCategoryComponent', () => {
  let component: ClassCategoryComponent;
  let fixture: ComponentFixture<ClassCategoryComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ClassCategoryComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ClassCategoryComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
