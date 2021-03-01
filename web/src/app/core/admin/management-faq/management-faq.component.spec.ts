import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ManagementFaqComponent } from './management-faq.component';

describe('ManagementFaqComponent', () => {
  let component: ManagementFaqComponent;
  let fixture: ComponentFixture<ManagementFaqComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ManagementFaqComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ManagementFaqComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
