import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SubAnnoucementComponent } from './sub-annoucement.component';

describe('SubAnnoucementComponent', () => {
  let component: SubAnnoucementComponent;
  let fixture: ComponentFixture<SubAnnoucementComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SubAnnoucementComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SubAnnoucementComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
